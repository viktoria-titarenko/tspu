new Vue({
    el: "#app",
    vuetify: new Vuetify(),
    data() {
        return {
            lessons: [],
            semester:[],
            coursesCount: null,
            semestrs: null,
            course: null,
            semester1: null,
            semester2: null,
            lessonsemester1:[],
            lessonsemester2: [],
            table1: false,
            table2: false,
            markview:[],
        }
    },
    methods: {
        getlesson() {
            let formData = new FormData();
            formData.append("group", window.localStorage.getItem("group"));
            formData.append("idstudent", window.localStorage.getItem("idstudent"))
            fetch('/portfolionew/progress/getlesson', {method: "post", body: formData})
            .then(r => r.json())
            .then(d => {
                if(Object.keys(d).includes('error')) {
                    window.top.location.href = "/portfolionew/student";
                }
                this.lessons = d.marks;
                this.semester = d.semester;
                this.coursesCount = Math.ceil((this.semester.length)/ 2);
                /* console.log(this.lessons); */
            });
        },
        getmarks(e){
            this.table2= false;
            lessonsemester1=[];
            let course = e.target.getAttribute('course');
            semester1 = course*2-1;
            semester2 = course*2;
            this.lessonsemester1 = [];
            this.lessonsemester2 = [];
            for (var i=0; i < this.lessons.length; i++ ){
                if (this.lessons[i].semester == semester1){
                    this.lessonsemester1.push(this.lessons[i]);
                }
            }
            for (var i=0; i < this.lessons.length; i++ ){
                if (this.lessons[i].semester == semester2){
                    this.lessonsemester2.push(this.lessons[i]);
                }
            }
            
            if (this.lessonsemester1.length != 0){
                
                this.table1= true;
            }
            
            if (this.lessonsemester2.length != 0){
                this.table2= true;
        }
            console.log(this.lessons);
        },

        redirect(e) {
            window.localStorage.setItem('lesson', e.target.getAttribute('data-id'));
            window.top.location.href = ('/portfolionew/files');
        },
    },
    created: function () {
        this.getlesson();
    }
});