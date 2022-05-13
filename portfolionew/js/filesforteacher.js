new Vue({
    el: "#app",
    vuetify: new Vuetify(),
    data() {
        return {
            files: [],
            file: null,
            fileBody: null,
            marks:[],
            newmarks:[],
            
        }
    },
    methods: {
        getFiles() {
            let formData = new FormData();
            formData.append("studentId", window.localStorage.getItem("studentId"));
            formData.append("teacherLessonsId", window.localStorage.getItem("teacherLessonsId"));
            fetch('/portfolionew/filesforteacher/listjson', {method: "post", body: formData})
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
            formData.append('idteacher', window.localStorage.getItem('idteacher'));
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
            let markId = e.target.getAttribute('mark-id');
            console.log (markId);
            window.localStorage.setItem('markId', markId);
            let fileId = e.target.getAttribute('file-id');
            console.log (fileId);
            window.localStorage.setItem('fileId', fileId);
           
            
        },
        mmarks(){
            fetch('/portfolionew/filesforteacher/marks', {
                method: 'POST',
            }).then(response => response.json())
                .then(data => {
                    this.marks = data;
                })
        },
        gettmarks(){
            let formData = new FormData();
            formData.append('markId', window.localStorage.getItem('markId'));
            formData.append('fileId', window.localStorage.getItem('fileId'));
            fetch('/portfolionew/filesforteacher/getmarks', {
                method: 'POST',
                body: formData
            }).then(response => response.json())
                .then(data => {
                    console.log(data)
                    console.log(this.files)
                    this.newmarks = data;
                })
        },
        sendmark(){
            let formData = new FormData();
            formData.append('markId', window.localStorage.getItem('markId'));
            formData.append('fileId', window.localStorage.getItem('fileId'));
            fetch('/portfolionew/filesforteacher/sendmarks', {
                method: 'POST',
                body: formData
            }).then(data => {
                this.getFiles();
                })

        }
    },
    created: function () {
        this.getFiles();
        this.mmarks();
    }
});