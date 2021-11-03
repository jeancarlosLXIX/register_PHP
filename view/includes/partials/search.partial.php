<?php
$search = $_GET['buscador'] ?? '';
?>

<form>
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Buscar" name="buscador"
  value="<?php echo $search; ?>">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
  </div>
</div>
</form>