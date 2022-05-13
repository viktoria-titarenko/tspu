new Vue({
    el: "#app",
    vuetify: new Vuetify(),
    data() {
        return {
            students: [],
        }
    },
    methods: {
        getstudens() {
            let formData = new FormData();
            formData.append("groupId", window.localStorage.getItem("groupId"));
            fetch('/portfolionew/studentfromteacher/listjson', {method: "post", body: formData})
            .then(r => r.json())
            .then(d => {
                this.students = d;
            });
        },
        redirect(e) {
            let studentId = e.target.getAttribute('data-id');
            window.localStorage.setItem('studentId', studentId);
            window.top.location.href = ('/portfolionew/filesforteacher');
        },
    },
    created: function () {
        this.getstudens();
    }
});