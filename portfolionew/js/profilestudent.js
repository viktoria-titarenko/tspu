new Vue({
    el: "#app",
    vuetify: new Vuetify(),
    data() {
        return {
            students: [],
            informations: [],
            fileBody: null,
        }
    },
    methods: {
        fillStudents() {
            let formData = new FormData();
            formData.append("idstudent", window.localStorage.getItem("idstudent"));
            fetch('/portfolionew/profilestudent/listjson', {method: "post", body: formData})
            .then(r => r.json())
            .then(d => this.students = d);
        },
        getinformation(){
            let formData = new FormData();
            formData.append("idstudent", window.localStorage.getItem("idstudent"));
            fetch('/portfolionew/profilestudent/getinformation', {method: "post", body: formData})
            .then(r => r.json())
            .then(d => {this.informations = d;
                window.localStorage.setItem('group',this.informations[0].groupnumber);})
        },
        redirect(e) {
            window.top.location.href = ('/portfolionew/files');
        },
    },
    created: function () {
        this.fillStudents();
        this.getinformation();
    }
});