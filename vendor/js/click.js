let editProfile = document.querySelector('.editProfile');
// let hidefile = document.querySelector('.hidefile');
editProfile.addEventListener('mouseover', ()=>{
    hidefile()
})
function hidefile() {
    let hidefile = document.querySelector('.hidefile');
    if (hidefile.style.display === "none") {
        hidefile.style.display = "block";
    } else {
        hidefile.style.display = "none";
    }
    console.log(hidefile)
  }