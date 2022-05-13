new Vue({
    el: "#app",
    vuetify: new Vuetify(),
    data() {
        return {
            teacherLessons: [],
            coursesCount: null
        }
    },
    methods: {
        getteacherLessons() {
            let formData = new FormData();
            formData.append("idteacher", window.localStorage.getItem("idteacher"));
            fetch('/portfolionew/teacherLessons/listjson', {method: "post", body: formData})
            .then(r => r.json())
            .then(d => {
                this.teacherLessons = d;
            });
        },
        redirect(e) {
            let lessonName = e.target.getAttribute('data-id');
            window.localStorage.setItem('teacherLessonsId', lessonName);
            window.top.location.href = ('/portfolionew/group');
        },
    },
    created: function () {
        this.getteacherLessons();
    }
});