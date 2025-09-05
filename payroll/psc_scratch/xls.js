function exportTableToExcel(tableID, filename = "") {
    // var style =
    //     '<!DOCTYPE html> <html lang = "en"><head><meta charset = "UTF-8"><meta http-equiv = "X-UA-Compatible"content = "IE=edge" > <meta name = "viewport"content = "width=device-width, initial-scale=1.0" > <title > Table or report < /title> <style >table {width: 96 % ;margin: 2 % 2 % ;border - collapse: collapse;font - family: Arial,Helvetica,sans - serif;}tr: nth - of - type(odd) {background: #eee;}th {background: blue;color: white;font - weight: bold;}td,th {padding: 6 px;border: 1 px solid# ccc;text - align: left;} </style ></head><body >';
    var downloadLink;
    var dataType = "application/vnd.ms-excel";
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, "%20");
    // tableHTML = style + tableHTML;
    // alert(tableSelect);
    const d = new Date();
    const name =
        "_Report" + d.getDate() + "_" + d.getMonth() + "_" + d.getFullYear();
    filename = filename + name;
    // Specify file name
    filename = filename ? filename + ".xls" : "excel_data.xls";

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if (navigator.msSaveOrOpenBlob) {
        var blob = new Blob(["\ufeff", tableHTML], {
            type: dataType,
        });
        navigator.msSaveOrOpenBlob(blob, filename);
    } else {
        // Create a link to the file
        downloadLink.href = "data:" + dataType + ", " + tableHTML;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }
}

function generatePDF(tableID, filename = "") {
    var table = document.getElementById(tableID).outerHTML;
    const d = new Date();
    const name =
        "_Report " + d.getDate() + "_" + d.getMonth() + "_" + d.getFullYear();
    filename = filename + name;
    // Specify file name
    filename = filename ? filename + ".pdf" : "report_data.pdf";

    var form = document.getElementById("pdf_form");
    document.getElementById("pdf_table").value = table;
    document.getElementById("filename").value = filename;

    form.submit();
}