let editProfile = document.querySelector('.editProfile');
let trainerProfile = document.querySelector('.trainProfile');

console.log(trainerProfile)
// console.log(trainhidefile)
editProfile.addEventListener('mouseover', ()=>{
    hidefile()

})

trainerProfile.addEventListener('mouseover', ()=>{
    // trainHidefile()
    let hidefile = document.querySelector('.hidefile');
    hidefile.style.display = "block";
})
function hidefile() {
    let hidefile = document.querySelector('.hidefile');
    if (hidefile.style.display === "none") {
        hidefile.style.display = "block";
    } else {
        hidefile.style.display = "none";
    }
  }

function trainHidefile() {
    let fileImatra = document.querySelector('.trainhidefile');
    if (fileImatra.style.display === "none"){
        fileImatra.style.display = "block";
    }else{
        fileImatra.style.display = "none"
    }
}