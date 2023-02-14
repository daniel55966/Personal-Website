/* Toggle between adding and removing the "responsive" class 
to topnav when the user clicks on the icon */

function navFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

/* Show the table on the results page */
document.getElementById("showButton").onclick = function() {
    let dataTable = document.getElementById("dataTable");
    if (dataTable.style.visibility === "hidden") {
        dataTable.style.visibility === "visible";
    } else {
        dataTable.style.visibility === "hidden";
    }
};
