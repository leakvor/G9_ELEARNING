let courses = document.querySelectorAll('.all_courses')
let student = document.querySelectorAll('.all_student')
let show_course = document.querySelector('#show_course')
let show_student = document.querySelector('#show_student')
let active_barc = document.querySelector('.active_barc')
let active_bars = document.querySelector('.active_bars')

show_course.addEventListener('click', showCourse)
show_student.addEventListener('click', showStudent)



function showCourse() {
    for (let i = 0; i < courses.length; i++) {
        eachCourse = courses[i]
        if (eachCourse.style.display == "none"){
            eachCourse.style.display = "block"
            active_barc.style.display = "block"
        }else{
            eachCourse.style.display = "none"
            active_barc.style.display = "none"
        }
    }
    for (let i = 0; i < student.length; i++) {
        eachStudent = student[i]
        if (eachStudent.style.display == "none" | eachStudent.style.display == "block"){
            eachStudent.style.display = "none"
            active_bars.style.display = "none"
        }
    }
    
}
function showStudent() {
    for (let i = 0; i < student.length; i++) {
        eachStudent = student[i]
        if (eachStudent.style.display == "none"){
            eachStudent.style.display = "block"
            active_bars.style.display = "block"
        }else{
            eachStudent.style.display = "none"
            active_bars.style.display = "none"
        }
    }
    for (let i = 0; i < courses.length; i++) {
        eachCourse = courses[i]
        if (eachCourse.style.display == "block"){
            eachCourse.style.display = "none"
            active_barc.style.display = "none"
        }
    }
    
}
