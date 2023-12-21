<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <?php echo get_phrase('Parent insert'); ?>
            </div>
            <div class="panel-body">
                <?php echo form_open(base_url() . 'admin/parent/create', array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label class="col-md-12" for="example-text">
                        <?php echo get_phrase('Name'); ?>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12" for="example-text">
                        <?php echo get_phrase('Email'); ?>
                    </label>
                    <div class="col-sm-12">
                        <input type="email" name="email" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12" for="example-text">
                        <?php echo get_phrase('Phone'); ?>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" name="phone" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12" for="example-text">
                        <?php echo get_phrase('Password'); ?>
                    </label>
                    <div class="col-sm-12">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12" for="example-text">
                        <?php echo get_phrase('Profession'); ?>
                    </label>
                    <div class="col-sm-12">
                        <input type="text" name="profession" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12" for="example-text">
                        <?php echo get_phrase('Address'); ?>
                    </label>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="address"><?php echo $parent['address']; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block btn-rounded btn-sm"><i
                            class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>