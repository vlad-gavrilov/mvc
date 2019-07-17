<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<div class="main-container col2-left-layout">
  <div class="main">
    <h1 align="center">Личный кабинет</h1>
    Добро пожаловать, <b><?php echo $userData['name']; ?></b>!
    <table>
      <tr>
        <td>Ваше имя: </td>
        <td><?php echo $userData['name']; ?></td>
      </tr>
      <tr>
        <td>Ваш id: </td>
        <td><?php echo $userData['id']; ?></td>
      </tr>
      <tr>
        <td>Ваш email: </td>
        <td><?php echo $userData['email']; ?></td>
      </tr>
      <tr>
        <td><button> <a href="/user/edit" style="color: black">Редактировать данные</a></button></td>
      </tr>
    </table>
  </div>
</div>

<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
