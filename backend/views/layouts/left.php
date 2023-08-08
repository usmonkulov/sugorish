<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Management', 'options' => ['class' => 'header']],
                        ['label' => Yii::t('app', "Sug'orish"), 'options' => ['class' => 'no-active'], 'icon' => 'folder', 'items' => [
                            ['label' => 'Yo\'l nomi', 'icon' => 'fa fa-irrigation', 'url' => ['/road/index'], 'active' => $this->context->id == 'irrigation/index'],
                            ['label' => 'Lavozimlar', 'icon' => 'file-o', 'url' => ['/enum-road-position/index'], 'active' => $this->context->id == 'enum/enum-road-position'],
                        ]],
                        ['label' => 'Blog', 'options' => ['class' => 'no-active'], 'icon' => 'folder', 'items' => [
                            ['label' => 'Posts', 'icon' => 'file-o', 'url' => ['/blog/post/index'], 'active' => $this->context->id == 'blog/post'],
                            ['label' => 'Comments', 'icon' => 'file-o', 'url' => ['/blog/comment/index'], 'active' => $this->context->id == 'blog/comment'],
                            ['label' => 'Tags', 'icon' => 'file-o', 'url' => ['/blog/tag/index'], 'active' => $this->context->id == 'blog/tag'],
                            ['label' => 'Categories', 'icon' => 'file-o', 'url' => ['/blog/category/index'], 'active' => $this->context->id == 'blog/category'],
                        ]],
                        ['label' => 'Content', 'options' => ['class' => 'no-active'], 'icon' => 'folder', 'items' => [
                            ['label' => 'Pages', 'icon' => 'file-o', 'url' => ['/page/index'], 'active' => $this->context->id == 'page'],
                            ['label' => 'Files', 'icon' => 'file-o', 'url' => ['/file/index'], 'active' => $this->context->id == 'file'],
                        ]],
                    ['label' => Yii::t('app', 'Foydalanuvchilar'), 'icon' => 'users', 'url' => ['/user/index'], 'active' => $this->context->id == 'user/index'],
                ],
            ]
        ) ?>

    </section>

</aside>
