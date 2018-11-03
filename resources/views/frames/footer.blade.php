                        <footer>
                            <p class="float-right"><a href="#">Back to top</a></p>
                            <p>2018 &copy; World Food Programme <!-- <a href="#">Donate</a> &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms of Use</a> --></p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        
        <script>window.jQuery || document.write('<script src="./js/jquery.min.js"><\/script>')</script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        
        <script src="js/lightzoom.js"></script>
        
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        {{HTML::script("js/holder.min.js")}}
        
        {{HTML::script("js/tether.min.js")}}
        
        {{HTML::script("js/bootstrap.min.js")}}
        
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        {{HTML::script("js/ie10-viewport-bug-workaround.js")}}
        
        <!-- Custom scripts for SB Admin template -->
        {{HTML::script("js/sb-admin.min.js")}}
        
        <!-- for zooming image-->
        {{HTML::script("js/lightzoom.js")}}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script>
            // My Select2 Javascript (external .js resource or <script> tag)
            $(document).ready(function () {
                $('.js-office-single').select2({
                    placeholder: "Select an office",
                    allowClear: true,
                    width:  '100%',
                });
            });

            $(document).ready(function () {
                $('.js-venue-single').select2({
                    placeholder: "Select a venue",
                    allowClear: true,
                    width:  '100%',
                });
            });

            $(document).ready(function () {
                $('.js-beverages-multiple').select2({
                    placeholder: "Beverages",
                    width:  '100%',
                });
            });

            // Set the "bootstrap" theme as the default theme for all Select2
            $.fn.select2.defaults.set( "theme", "bootstrap" );
        </script>

        
        <!-- Vue.js code for media alert -->
        <script>
        var vm = new Vue ({
        el:"#app",
        data:{
        mediatype:{!! json_encode(old('mediatype')) !!},
        type:{!! ($errors->has('type'))?json_encode(Session::get('mediatype')):json_encode(old('type')) !!},
        mediaisimage:false,
        mediaislink:false,
        header:{!! ($errors->has('header'))?json_encode(Session::get('header')):json_encode(old('header')) !!},
        source:{!! ($errors->has('source'))?json_encode(Session::get('source')):json_encode(old('source')) !!},
        mediacontent:{!! ($errors->has('mediacontent'))?json_encode(Session::get('mediacontent')):json_encode(Session::get('mediacontent')) !!},
        mediaid:'edit_media_alert/' + {!! ($errors->any())?json_encode(Session::get('mediaid')):json_encode('') !!},
        
        @if(Request::is('home'))
        news:{!! json_encode($news) !!},
        stories:{!! json_encode($stories) !!},
        showNewsBlock:'',
        newscardcolor:'card-outline-primary',
        newstextcolor:'text-primary',
        showStoryBlock:'',
        storycardcolor:'card-outline-primary',
        storytextcolor:'text-primary',
        @endif

        requirebeverages:'No',
        },
        mounted: function(){
        if(this.type == 'Image'){
            this.mediacontent = {!! json_encode(URL::to('imagecache/original')) !!} + '/' + this.mediacontent;
            this.mediaisimage = true;
            this.mediaislink = false;
        }
        },
        methods:{
        showModal: function(media){
            this.header = media.header;
            this.mediacontent = {!! json_encode(URL::to('imagecache/original')) !!} + '/' + media.mediacontent;
            this.source = media.source;
        },
        editModal: function(media){
            this.mediaid = 'edit_media_alert/' + media.id;
            this.header = media.header;
            this.type = media.type;
            this.source = media.source;
            if(this.type == 'Image'){
                this.mediacontent = {!! json_encode(URL::to('imagecache/original')) !!} + '/' + media.mediacontent;
                this.mediaisimage = true;
                this.mediaislink = false;
            }else{
                this.mediacontent = media.mediacontent;
                this.mediaislink = true;
                this.mediaisimage = false;
            }
        },
        deleteModal: function(media){
            this.mediaid = 'delete_media_alert/' + media.id;
            this.header = media.header;
            this.type = media.type;
            this.source = media.source;
            if(this.type == 'Image'){
                this.mediacontent = {!! json_encode(URL::to('imagecache/original')) !!} + '/' + media.mediacontent;
                this.mediaisimage = true;
                this.mediaislink = false;
            }else{
                this.mediacontent = media.mediacontent;
                this.mediaislink = true;
                this.mediaisimage = false;
            }
        },
        changenewscolor: function(news_update){
            this.showNewsBlock = news_update;
            this.newscardcolor = '';
            this.newstextcolor = 'text-white';
        },
        changebacknewscolor: function(news_update){
            this.showNewsBlock = '';
            this.newscardcolor = 'card-outline-primary';
            this.newstextcolor = 'text-primary';
        },
        changestorycolor: function(story){
            this.showStoryBlock = story;
            this.storycardcolor = '';
            this.storytextcolor = 'text-white';
        },
        changebackstorycolor: function(story){
            this.showStoryBlock = '';
            this.storycardcolor = 'card-outline-primary';
            this.storytextcolor = 'text-primary';
        }
        }
        });
        </script>

        <!-- Enable Scrollspy -->
        <script>
        $(document).ready(function(){
        $('.scrollspy').scrollSpy();
        });
        </script>

        <!-- script tag for the input field in the blackboard -->
        <script>
        function myFunction() {
        var x = document.getElementById("myInput").value;
        document.getElementById("demo").innerHTML = " " + x;
        }
        </script>

        <!-- Enable Pop-overs everywhere -->
        <script>
        $(function () {
        $('[data-toggle="popover"]').popover()
        })
        </script>

        <!-- Enable Zooming in every images in media alerts -->
        <script type="text/javascript">
        jQuery('.lightzoom').lightzoom({speed: 400,
        viewTitle: true,
        isOverlayClickClosing: false,
        isWindowClickClosing: true,
        isEscClosing: true
        });
        </script>


        <script>
        /**
        * this workaround makes magic happen
        * thanks @harry: http://stackoverflow.com/questions/18111582/tinymce-4-links-plugin-modal-in-not-editable
        */
        $(document).on('focusin', function (e) {
        if ($(e.target).closest(".mce-window").length || $(e.target).closest(".moxman-window").length) {
        e.stopImmediatePropagation();
        }
        });
        </script>

        @if(Session::has('create_post') || Session::has('new_post_error') || Session::has('post_id') || Session::has('edit_post_error'))
        <script>$('#add-post-modal').modal('show');</script>
        @endif

        @if(Session::has('read_post'))
        <script>$('#read-post').modal('show');</script>
        @endif

        @if(Session::has('create_news_post') || Session::has('new_news_post_error') || Session::has('news_post_id') || Session::has('edit_news_post_error'))
        <script>$('#add-news-modal').modal('show');</script>
        @endif

        @if(Session::has('read_news_post'))
        <script>$('#read-news-modal').modal('show');</script>
        @endif

        @if(Session::has('add_update') || Session::has('create_update') || Session::has('new_update_error') || Session::has('update_id') || Session::has('edit_update_error'))
        <script>$('#add-update-modal').modal('show');</script>
        @endif

        @if(Session::has('read_update'))
        <script>$('#read-update-modal').modal('show');</script>
        @endif

        @if(Session::has('view_user_bio') || Session::has('add_user_bio'))
        <script>$('#user-bio-modal').modal('show');</script>
        @endif

        @if(Session::has('add_user') || Session::has('add_user_error') || Session::has('edit_user') || Session::has('edit_user_error'))
        <script>$('#addUserModal').modal('show');</script>
        @endif

        @if(Session::has('add_editor') || Session::has('add_editor_error') || Session::has('edit_editor') || Session::has('edit_editor_error'))
        <script>$('#addEditorModal').modal('show');</script>
        @endif

        @if(Session::has('create_story') || Session::has('new_story_error') || Session::has('edit_story') || Session::has('edit_story_error'))
        <script>$('#add-story-modal').modal('show');</script>
        @endif

        @if(Request::is('innovation'))
        <script>$('#announcement').modal('show');</script>
        @endif

        @if(Session::has('new_media_alert_error'))
        <script>$('#add-media-alert-modal').modal('show');</script>
        @endif

        @if(Session::has('edit_media_alert_error'))
        <script>$('#edit-media-alert-modal').modal('show');</script>
        @endif
    </body>
</html>