<div class="modal fade bd-example-modal-lg" id="modal-media" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="page-content container-fluid">
                    @include('voyager::alerts')
                    <div class="row">
                        <div class="col-md-12">

                            <div class="admin-section-title">
                                <h3><i class="voyager-images"></i> {{ __('voyager::generic.media') }}</h3>
                            </div>
                            <div class="clear"></div>

                            <div id="filemanager">
                                <div id="toolbar">
                                    <button type="button" class="btn btn-default" id="refresh"><i
                                                class="voyager-refresh"></i>
                                    </button>
                                </div>
                                <div id="content">

                                    <div class="breadcrumb-container">
                                        <ol class="breadcrumb filemanager">
                                            <li class="media_breadcrumb" data-folder="/" data-index="0"><span
                                                        class="arrow"></span><strong>{{ __('voyager::media.library') }}</strong>
                                            </li>

                                            <template v-for="(folder, index) in folders">
                                                <li v-bind:data-folder="folder" v-bind:data-index="index+1"
                                                    v-bind:class="{media_breadcrumb: index !== folders.length - 1}"><span
                                                            class="arrow"></span>@{{ folder }}
                                                </li>

                                            </template>
                                        </ol>

                                        <div class="toggle"><span>{{ __('voyager::generic.close') }}</span><i
                                                    class="voyager-double-right"></i></div>
                                    </div>
                                    <div class="flex">
                                        <div id="left">
                                            <ul id="files">
                                                <li class="file_link_li" v-for="(file,index) in files.items">
                                                    <div class="file_link" :data-folder="file.name"
                                                         :data-index="index">
                                                        <div class="image-name" :data-image="file.path"
                                                             v-if="file.type != 'folder'"></div>
                                                        <div class="link_icon">
                                                            <template v-if="file.type.includes('image')">
                                                                <div class="img_icon" :style="imgIcon(file.path)"
                                                                     v-on:dblclick="select_cat_image"></div>
                                                            </template>

                                                            <template v-if="file.type == 'folder'">
                                                                <i class="icon voyager-folder"></i>
                                                            </template>
                                                        </div>
                                                        <div class="details" :data-type="file.type">
                                                            <div :class="file.type">
                                                                <h4>@{{ file.name }}</h4>
                                                                <small>
                                                                    <template v-if="file.type == 'folder'">
                                                                        <!--span class="num_items">@{{ file.items }} file(s)</span-->
                                                                    </template>
                                                                    <template v-else>
                                                                        <span class="file_size">@{{ file.size }}</span>
                                                                    </template>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div id="no_files">
                                                <h3>
                                                    <i class="voyager-meh"></i> {{ __('voyager::media.no_files_in_folder') }}
                                                </h3>
                                            </div>

                                        </div>

                                        <div id="right">
                                            <div class="right_none_selected">
                                                <i class="voyager-cursor"></i>
                                                <p>{{ __('voyager::media.nothing_selected') }}</p>
                                            </div>
                                            <div class="right_details">
                                                <div class="detail_img">
                                                    <div :class="selected_file.type">
                                                        <template v-if="selectedFileIs('image')">
                                                            <img :src="selected_file.path"/>
                                                        </template>
                                                        <template v-if="selected_file.type == 'folder'">
                                                            <i class="voyager-folder"></i>
                                                        </template>
                                                    </div>
                                                </div>
                                                <div class="detail_info">
                                                    <div :class="selected_file.type">
                                            <span><h4>{{ __('voyager::media.title') }}:</h4>
    							            <p>@{{selected_file.name}}</p></span>
                                                        <span><h4>{{ __('voyager::media.type') }}:</h4>
    							            <p>@{{selected_file.type}}</p></span>

                                                        <template v-if="selected_file.type != 'folder'">
    								            <span><h4>{{ __('voyager::media.size') }}:</h4>
    								            <p><span class="selected_file_count">@{{ selected_file.items }} item(s)</span><span
                                                            class="selected_file_size">@{{selected_file.size}}</span></p></span>
                                                            <span><h4>{{ __('voyager::media.public_url') }}:</h4>
    								            <p><a :href="selected_file.path"
                                                      target="_blank">Click Here</a></p></span>
                                                            <span><h4>{{ __('voyager::media.last_modified') }}:</h4>
    								            <p>@{{ dateFilter(selected_file.last_modified) }}</p></span>
                                                        </template>
                                                    </div>
                                                </div>
                                            </div>

                                        </div><!-- #right -->

                                    </div>

                                    <div class="nothingfound">
                                        <div class="nofiles"></div>
                                        <span>{{ __('voyager::media.no_files_here') }}</span>
                                    </div>

                                </div>

                            </div><!-- #filemanager -->

                        </div><!-- .row -->
                    </div><!-- .col-md-12 -->
                </div><!-- .page-content container-fluid -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary choose-image">choose</button>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="storage_path" value="{{ storage_path() }}">
<input type="hidden" id="base_url" value="{{ route('voyager.dashboard') }}">