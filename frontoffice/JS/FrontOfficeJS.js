var rotateStatus = 1;
var rotateWait = false;
document.cookie = "DS-Color" + "=" + 1 + ";" + "max-age=" + 900;

function draaiDeSchijf() {

    if (rotateWait == true) {
        return;
    }
    setTimeout(resetWait, 1000);
    rotateWait = true;

    if (rotateStatus == 0) {
        rotateStatus = 1;
        document.getElementById('Schijf').style.animation = "ToGreen 1s";
        document.getElementById('Schijf').style.transform = "rotate(0deg)";
        changeInfoColor(1);
        storage(1);
    }
    if (rotateStatus == 1) {
        rotateStatus = 2;
        document.getElementById('Schijf').style.animation = "ToOrange 1s";
        document.getElementById('Schijf').style.transform = "rotate(120deg)";
        changeData(2);
        storage(2);
    }
    else if (rotateStatus == 2) {
        rotateStatus = 3;
        document.getElementById('Schijf').style.animation = "ToRed 1s";
        document.getElementById('Schijf').style.transform = "rotate(240deg)";
        changeData(3);
        storage(3);
    }
    else if (rotateStatus == 3) {
        rotateStatus = 1;
        document.getElementById('Schijf').style.animation = "ToGreen 1s";
        document.getElementById('Schijf').style.transform = "rotate(0deg)";
        changeData(1);
        storage(1);
    }

}

function resetWait() {
    rotateWait = false;
}

function changeData(color) {
    if (color == 1) {
        document.getElementById('GreenINFOtext').style.color = "lime";
        document.getElementById('OrangeINFOtext').style.color = "black";
        document.getElementById('RedINFOtext').style.color = "black";
        document.getElementById('probleeminfo').placeholder = "Fijn om te horen! Hier kunt u uw compliment opgeven";
    }
    else if (color == 2) {
        document.getElementById('GreenINFOtext').style.color = "black";
        document.getElementById('OrangeINFOtext').style.color = "gold";
        document.getElementById('RedINFOtext').style.color = "black";
        document.getElementById('probleeminfo').placeholder = "Waar kunnen we u mee helpen?";
    }
    else if (color == 3) {
        document.getElementById('GreenINFOtext').style.color = "black";
        document.getElementById('OrangeINFOtext').style.color = "black";
        document.getElementById('RedINFOtext').style.color = "red";
        document.getElementById('probleeminfo').placeholder = "Waar kunnen we u mee helpen?";
    }
}

function storage(color) {
    document.cookie = "DS-Color" + "=" + color + ";" + "max-age=" + 900; //10 min
}
