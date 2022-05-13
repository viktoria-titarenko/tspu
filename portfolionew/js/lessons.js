new Vue({
    el: "#app",
    vuetify: new Vuetify(),
    data() {
        return {
            lessons: [],
        }
    },
    methods: {
        getLessons() {
            let formData = new FormData();
            formData.append("idstudent", window.localStorage.getItem("idstudent"));
            formData.append("semestr", window.localStorage.getItem("semestr"));
            fetch('/portfolionew/lessons/listjson', {method: "post", body: formData})
            .then(r => r.json())
            .then(d => {
                if(Object.keys(d).includes('error')) {
                    window.top.location.href = "/portfolionew/student";
                }
                this.lessons = d;
            });
        },
        redirect(e) {
            window.localStorage.setItem('lesson', e.target.getAttribute('data-id'));
            window.top.location.href = ('/portfolionew/files');
        },
    },
    created: function () {
        this.getLessons();
    }
});