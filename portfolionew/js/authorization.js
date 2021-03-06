new Vue({
    el: "#app",
    vuetify: new Vuetify(),
    data() {
        return {
            groups: [],
            loginstudent: null,
            passwordstudent: null,
            dialog: false,
            errorText:null,
            errorText:null,
        }
    },
    methods: {
        getstudent() {
            let formData = new FormData();
            formData.append("password",this.passwordstudent);
            formData.append("login",this.loginstudent);
            fetch('/portfolionew/authorization/getstudent', {method: "post", body: formData})
            .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            if (data.error == true){
                                this.dialog = true;
                            this.errorText = data.text;
                            return;
                           
                        }
                        if (data[0].id_teacher){
                            console.log(data.id_teacher);
                            window.top.location.href = ('/portfolionew/profileteacher');
                            window.localStorage.setItem('idteacher', data[0].id_teacher);
                            console.log('hello');
                            window.localStorage.setItem('position', 2);
                            return; 
                        }
                        if (data[0].id_student){
                            console.log('heere')
                            window.localStorage.setItem('idstudent', data[0].id_student);
                            window.top.location.href = ('/portfolionew/profilestudent');
                            window.localStorage.setItem('position', 1);
                            return; 
                        }
                       
            });
        },
        enter(e){
            console.log(e);
            e = e || window.event;
                if (e.keyCode === 13) {
                    this.getstudent();
            
                }
            
        },

        redirect(e) {
            window.top.location.href = ('/portfolionew/profilestudent');
         
        },
    },
    created: function () {
        
    }
});