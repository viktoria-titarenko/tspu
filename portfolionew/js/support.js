new Vue({
    el: "#app",
    vuetify: new Vuetify(),
    data() {
        return {
            students: [],
            subject: null,
            text: null,
            dialog: false,
            notification:false,
            errorText:null,
            notificationText:null,
        }
    },
    methods: {
        sendemail() {
            let formData = new FormData();
            formData.append("subject",this.subject);
            formData.append("text",this.text);
            console.log (this.subject);
            fetch('/portfolionew/support/listjson', {method: "post", body: formData})
            .then(r => r.json())
            .then(data => {
                console.log(data);
                if (data.error == true){
                    this.dialog = true;
                this.errorText = data.text;
                return;}
                if (data.notification == true){
                    this.notification = true;
                this.notificationText = data.text;
                this.text = "";
                this.subject = "";
                return;}
                   
            });
          
        },
        redirect(e) {
            let studentId = e.target.getAttribute('data-id');
            window.localStorage.setItem('studentId', studentId);
            window.top.location.href = ('/portfolionew/filesforteacher');
        },
    },
    created: function () {
    }
});