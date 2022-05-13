new Vue({
    el: "#app",
    vuetify: new Vuetify(),
    data() {
        return {
            students: [],
            studentInfo: null,
        }
    },
    methods: {
        fillStudents() {
            fetch('/portfolionew/student/listjson')
            .then(r => r.json())
            .then(d => this.students = d);
        },
        redirect() {
            window.localStorage.setItem('user', this.studentInfo);
            window.top.location.href = ('/portfolionew/semestr');
        },
    },
    created: function () {
        this.fillStudents();
    }
});