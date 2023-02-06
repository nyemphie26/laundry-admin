function addField(edit, variant, price){
    if (!edit) {
        let variantField = document.getElementById(variant);
        let priceField = document.getElementById(price);
    
        if( variantField.value === "" || priceField.value === ""){
            alert("Input Variant and Price First");
            return false;
        }
    }

    let row = document.getElementById('rowVariant');
    // creating the div row.
    let divRow = document.createElement("div");
    divRow.setAttribute("class", "row mt-4");

    let divCol1 = document.createElement("div");
    divCol1.setAttribute("class", "col-6");
    let divCol2 = document.createElement("div");
    divCol2.setAttribute("class", "col-3");
    let divCol3 = document.createElement("div");
    divCol3.setAttribute("class", "col-3 text-left");

    let divField = document.createElement("div");
    divField.setAttribute("class", "input-group input-group-static");
    let divField2 = document.createElement("div");
    divField2.setAttribute("class", "input-group input-group-static");
    
    //creating label
    let variantLabel = document.createElement("label");
    variantLabel.innerHTML = "Variant Name"
    // Creating the input element.
    let field = document.createElement("input");
    field.setAttribute("type", "text");
    field.setAttribute("class", "form-control");
    field.setAttribute("name", "variants[]");
    field.setAttribute("id", "variant");

    //creating label
    let priceLabel = document.createElement("label");
    priceLabel.innerHTML = "Price"
    // Creating the input element.
    let field2 = document.createElement("input");
    field2.setAttribute("type", "number");
    field2.setAttribute("class", "form-control w-100");
    field2.setAttribute("name", "price[]");
    field2.setAttribute("id", "price");

    // Creating the minus span element.
    let minus = document.createElement("button");
    minus.setAttribute("onclick", "removeField(this)");
    minus.setAttribute("class", "btn btn-link btn-sm");
    let minusText = document.createTextNode("- Remove field");
    minus.appendChild(minusText);

    row.appendChild(divRow);
    divRow.appendChild(divCol1);
    divRow.appendChild(divCol2);
    divRow.appendChild(divCol3);
    
    divCol1.appendChild(divField);
    divCol2.appendChild(divField2);
    divCol3.appendChild(minus);

    divField.appendChild(variantLabel);
    divField.appendChild(field);

    divField2.appendChild(priceLabel);
    divField2.appendChild(field2);

}
function removeField(minusElement, edit, variant, price){
    
    minusElement.parentElement.parentElement.remove();
}