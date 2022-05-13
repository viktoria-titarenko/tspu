new Vue({
    el: "#app",
    vuetify: new Vuetify(),
    data() {
        return {
            semestrs: null,
            coursesCount: null,
            course:[],
            coursee:null,
        }
    },
    methods: {
        getSemestr() {
            let formData = new FormData();
            formData.append("idstudent", window.localStorage.getItem("idstudent"));
            fetch('/portfolionew/semestr/listjson', {method: "post", body: formData})
            .then(r => r.json())
            .then(d => {
                this.semestrs = parseInt(d[0].semestrquantity);
                this.coursesCount = this.semestrs / 2;
            });
        },
        redirect(e) {
            let semestrNumber = e.target.getAttribute('data-id');
            window.localStorage.setItem('semestr', semestrNumber);
            window.top.location.href = ('/portfolionew/lessons');
        },
        getcourse(){
         this.coursee = window.localStorage.getItem("coursenow");
        }
    },
    created: function () {
        this.getSemestr();
        this.getcourse();
    }
});