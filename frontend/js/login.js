let closErrBtn = document.querySelector("#closeerr");
closErrBtn.onclick = () => {
    closErrBtn.parentElement.classList.add("fade");
    setTimeout(() => {
        closErrBtn.parentElement.parentElement.removeChild(closErrBtn.parentElement);   
    }, 1000);
}