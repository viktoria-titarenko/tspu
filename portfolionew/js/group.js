new Vue({
    el: "#app",
    vuetify: new Vuetify(),
    data() {
        return {
            groups: [],
        }
    },
    methods: {
        getgroup() {
            let formData = new FormData();
            formData.append("teacherLessonsId", window.localStorage.getItem("teacherLessonsId"));
            fetch('/portfolionew/group/listjson', {method: "post", body: formData})
            .then(r => r.json())
            .then(d => {
                this.groups = d;
            });
        },
        redirect(e) {
            let groupId = e.target.getAttribute('data-id');
            window.localStorage.setItem('groupId', groupId);
            window.top.location.href = ('/portfolionew/studentfromteacher');
        },
    },
    created: function () {
        this.getgroup();
    }
});