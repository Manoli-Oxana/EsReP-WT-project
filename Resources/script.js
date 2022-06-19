function alterRowById(id, rowIndex, ignoreType=true) {
    const format = { "Type": "text", "Name": "text", "Quantity": "number", "Unit": "text", "SupplyDate": "date", "NoticeDate": "date", "Options": "image" }
    const rows = document.querySelectorAll("tr")[rowIndex].childNodes

    let index = 0;
    for (const type in format) {
        if(ignoreType === 1 && index==0){
            ignoreType = false;
            continue;
        }
        
        let newRow = document.createElement("input");
        newRow.type = format[type];
        let cell = rows[index++ ];
        let oldValue = cell.innerHTML;
        cell.innerHTML = "";
        newRow.required = "true";
        if (format[type] === "image") {
            newRow.src = "../query_icons/save_icon.png";
            newRow.name = `updateRow${id}`;
            newRow.classList.add("button");
            newRow.alt = "update";
        } else {
            newRow.value = oldValue;
            newRow.name = `update${type}`
        }
        cell.appendChild(newRow);
    }

}