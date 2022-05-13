new Vue({
    el: "#app",
    vuetify: new Vuetify(),
    data() {
        return {
            files: [],
            file: null,
            fileBody: null,
        }
    },
    methods: {
        getFiles() {
            let formData = new FormData();
            formData.append("idstudent", window.localStorage.getItem("idstudent"));
            formData.append("lesson", window.localStorage.getItem("lesson"));
            fetch('/portfolionew/files/listjson', {method: "post", body: formData})
            .then(r => r.json())
            .then(d => {
                this.files=d;
            });
        },
        saveFile() {
            this.createImage(this.file);
        },
        createImage(file){
            this.fileName=file.name;
            var image = new Image();
            var reader = new FileReader();
            reader.onload = (e) => {
                this.fileBody = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        send_file(){
            this.createImage(this.file);
            let formData = new FormData();
            formData.append('filebody',this.fileBody);
            formData.append('fileName',this.fileName);
            formData.append('idstudent', window.localStorage.getItem('idstudent'));
            formData.append('lesson', window.localStorage.getItem('lesson'));
            fetch('/portfolionew/files/upload', {
                method: 'POST',
                body: formData
            }).then(response => response.json())
                .then(data => {
                    this.getFiles();
                })},
        redirect(e) {
            window.localStorage.setItem('lesson', e.target.getAttribute('data-id'));
            window.top.location.href = ('/portfolionew/files');
        },
    },
    created: function () {
        this.getFiles();
    }
});