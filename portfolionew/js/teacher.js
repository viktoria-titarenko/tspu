new Vue({
    el: "#app",
    vuetify: new Vuetify(),
    data() {
        return {
            teacher: [],
            teacherInfo: null,
        }
    },
    methods: {
        fillTeacher() {
            fetch('/portfolionew/teacher/listjson')
            .then(r => r.json())
            .then(d => this.teacher = d);
        },
        redirect() {
            window.localStorage.setItem('idteacher', this.teacherInfo);
            window.top.location.href = ('/portfolionew/teacherLessons');
        },
    },
    created: function () {
        this.fillTeacher();
    }
});