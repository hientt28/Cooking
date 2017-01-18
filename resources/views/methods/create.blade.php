<div id="myModal" class="modal fade" role="dialog" ng-controller="methodController">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top :15%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title blue header">
                   {{ trans('method.method_information') }}
                </h4>
            </div>
            <!-- {{ Form::open(['route' => 'methods.store', 'method' => 'post', 'name' => 'add-news', 'files' => true]) }} -->
            <form ng-hide="completed" ng-init="init()" name="simpleRecipeForm" class="ng-pristine ng-invalid ng-invalid-requied">
            <div class="modal-body">
                <div class="form">
                    <div class="field">
                        <div class="form-row">
                            <div class="form-group">
                                <div >
                                    <div><img class="default-photo"/></div>
                                    
                                    <div accept="image/*" title="select file" class="upload-button" style="right:auto; width: 100%">
                                        <div class="overlay">
                                            <span class="fa fa-camera upload-ico"></span>
                                            {{ trans('method.avatar')}}
                                        </div>
                                    </div>
                                </div>
                                <div style="height:2px" class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuemin="0" aria-valuemax="100">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="two fields">
                            <div class="form-row">
                                <div class="form-group has-feedback">
                                    <label>
                                        {{ trans('method.dish_name') }} <span style="color:red">*</span>
                                        <span class="fa fa-check-circle" style="float: right;position: relative;color: #7cb342;margin-top: 3px;"></span>
                                    </label>
                                    <input type="text" name="name" class="form-control name" required placeholder="{{ trans('method.dish_name') }}" />       
                                </div>
                            </div>
                        </div>

                        <div class="two fields">
                            <div class="form-row">
                                <div class="form-group has-feedback">
                                    <label>
                                        {{ trans('method.description')}}<span style="color:red">*</span>
                                        <span class="fa fa-check-circle" style="float: right;position: relative;color: #7cb342;margin-top: 3px;"></span>
                                    </label>
                                    <textarea rows="4" class="form-control" placeholder="{{ trans('method.description') }}" name="description" id="recipe-description" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="two fields">
                            <div class="form-row">
                                <label>{{ trans('method.level_time') }}</label>
                                <div class="form-group">
                                    
                                    <select style="float:left;margin-right:6px;width:180px;" class="form-control" id="recipe-level">
                                        <option value="0">{{ trans('method.not_specified') }}</option>
                                        <option value="1">{{ trans('method.easy') }}</option>
                                        <option value="2">{{ trans('method.medium') }}</option>
                                        <option value="3">{{ trans('method.difficult') }}</option>
                                    </select>
                                    <input style="width:100px; float:left;"  id="recipe-time" placeholder="{{ trans('method.minute') }}" type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="two fields">
                            <div class="form-row">
                                <label>{{ trans('method.video') }}<span class="text-gray">{{ trans('method.youtube_code') }}</span></label>
                                <div class="form-group">
                                    <div>
                                        <input type="text" class="form-control"  placeholder="{{ trans('method.code') }}"  id="recipe-video" />
                                        <div class="desc" style="font-style:italic;">
                                            {{ trans('method.you_code')}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="two fields">
                            <div class="form-row heading">
                                <div class="form-left">{{ trans('method.material') }}<span style="color:red">*</span></div>

                            </div>
                            <div class="form-row">
                                <textarea rows="4" class="form-control" placeholder="{{ trans('method.help') }}" required></textarea>

                                <div class="form-row" style="border-top:1px solid #eee;">
                                    <div><strong>{{ trans('method.other_material') }}</strong></div>
                                    <span class="text-gray text-small text-italic">
                                    </span>
                                    <div class="form-field">
                                        <input type="text" class="form-control name" required/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="two fields">
                            <div class="form-row heading">
                                <div class="form-group has-feedback">
                                    <label>
                                        {{ trans('method.steps_taken')}}<span style="color:red">*</span>
                                        <span class="fa fa-check-circle" style="float: right;position: relative;color: #7cb342;margin-top: 3px;"></span>
                                    </label>
                                    <textarea rows="4" class="form-control" placeholder="{{ trans('method.description') }}" name="description" id="recipe-description" required></textarea>
                                </div>
                            </div>
                            <div class="form-row">       
                                <a class="addmore-ingredients" href="" <span class="glyphicon glyphicon-plus"></span> {{ trans('method.add_steps_taken') }}</a>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>   
                    
            <div class="modal-footer">
                <button type="button" ng-click="toggle('add', 0)" class="btn btn-primary button add-news"><i class="plus icon"></i>{{ trans('method.add') }}</button>
                <button type="button" class="red button" data-dismiss="modal"><i class="cancel icon"></i>{{ trans('method.close') }}</button>
            </div>
            <!-- {{ Form::close() }} -->
            </form>
        </div>
    </div>
</div>