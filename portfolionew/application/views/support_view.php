<div id="app" data-app>
<v-dialog v-model="dialog" width="400">
            <v-card style="text-align:center; ">
                <v-card-title class="text-h5 black lighten-10" style="justify-content: center;" >
                    ОШИБКА
                </v-card-title>

                <v-card-text style="color: black; font-size: 17px; margin-top: 18px;">
                    {{errorText}}
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <button type="button" class="btn btn-primary" text @click="dialog = false" >Закрыть</button>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <v-dialog v-model="notification" width="400">
            <v-card style="text-align:center; ">
            <v-card-title class="text-h5 black lighten-10" style="justify-content: center;" >
                    Уведомление
                </v-card-title>
                <v-card-text style="color: black; font-size: 17px; margin-top: 18px;">
                    {{notificationText}}
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <button type="button" class="btn btn-primary" text @click="notification = false" >Закрыть</button>
                </v-card-actions>
            </v-card>
        </v-dialog>
    <div class="email" style="width: 600px;">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Тема обращения</label>
            <input v-model="subject"
             class="form-control"  >
          </div>
          <div class="mb-3">
            <label  class="form-label">Текст обращения</label>
            <textarea 
            input v-model="text"
            class="form-control"  rows="3"></textarea>
          </div>
          <div class="col-auto">
            <button @click="sendemail" type="submit"  style="margin-left: -13px;" class="btn btn-primary mb-3 ">Отправить</button>
          </div>
</div> 
<script src="/portfolionew/js/support.js"></script>