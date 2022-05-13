new Vue({
    el: "#app",
    vuetify: new Vuetify(),
    data() {
        return {
            teachers: [],
            informations: [],
            fileBody: null,
        }
    },
    methods: {
        fillStudents() {
            let formData = new FormData();
            formData.append("idteacher", window.localStorage.getItem("idteacher"));
            fetch('/portfolionew/profileteacher/listjson', {method: "post", body: formData})
            .then(r => r.json())
            .then(d => this.teachers = d);
        },
        getinformation(){
            let formData = new FormData();
            formData.append("idteacher", window.localStorage.getItem("idteacher"));
            fetch('/portfolionew/profileteacher/getinformation', {method: "post", body: formData})
            .then(r => r.json())
            .then(d => this.informations = d);
        },
        redirect(e) {
            window.localStorage.setItem('lesson', e.target.getAttribute('data-id'));
            window.top.location.href = ('/portfolionew/files');
        },
    },
    created: function () {
        this.fillStudents();
        this.getinformation();
    }
});