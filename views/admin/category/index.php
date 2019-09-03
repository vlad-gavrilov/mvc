<?php require_once(ROOT . '/views/layouts/header_admin.php') ?>

<div class="content container-fluid">
  <div class="row py-3">
    <div class="container-fluid mb-3">
      <div class="row">
        <div class="col">
          <a href="/admin/category/create">
            <button type="button" class="btn btn-block btn-primary">Добавить категорию</button>
          </a>
        </div>
      </div>
    </div>
    <div class="container-fluid table-responsive">
      <table class="table table-sm table-bordered table-hover">
        <thead>
          <tr class="text-center">
            <th scope="col" class="align-middle">#</th>
            <th scope="col" class="align-middle">Название</th>
            <th scope="col" class="align-middle">Сортировка</th>
            <th scope="col" class="align-middle">Статус</th>
            <th scope="col" class="align-middle">Лого</th>
            <th scope="col" class="align-middle">Редактировать</th>
            <th scope="col" class="align-middle">Удалить</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($categoriesList as $category): ?>
          <tr class="text-center">
            <?php foreach ($category as $key => $value): ?>
              <td class="align-middle">
                <?php
                  if ($key == "logo") {
                    echo htmlspecialchars_decode($value);
                  }
                  else {
                    if($key == "name") echo "<b>";
                      echo $value;
                    if($key == "name") echo "</b>";
                  }
                ?>
              </td>
            <?php endforeach; ?>
            <td class="align-middle"><a type="button" class="btn btn-block btn-warning" href="/admin/category/update/<?php echo $category['id']?>">Редактировать</a></td>
            <td class="align-middle"><a type="button" class="btn btn-block btn-danger" href="/admin/category/delete/<?php echo $category['id']?>">Удалить</a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php require_once(ROOT . '/views/layouts/footer_admin.php') ?>
