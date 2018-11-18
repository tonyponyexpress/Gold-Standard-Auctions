<div class="row">
  <form class="form-sell" action="backEnd/soldItem.php" method="post" enctype="multipart/form-data">
      <div class="form-group row">
        <label for="item" class="col-sm-3 col-form-label">Item</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="item" id="item" placeholder="Item">
        </div>
      </div>

      <div class="form-group row">
        <label for="description" class="col-sm-3 col-form-label">Description</label>
        <div class="col-sm-9">
          <textarea type="text" class="form-control" name="description" id="descriptionItem" placeholder="Description"> </textarea>
        </div>
      </div>

      <div class="form-group row">
        <label for="description" class="col-sm-3 col-form-label">Picture</label>
        <div class="col-sm-9">
          <input type="file" class="form-control" name="image" id="imageItem" placeholder="Browse">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-12">
          <input type="submit" class="btn" name="submit" id="submitItem" label="Submit" value="Submit"></input>
        </div>
      </div>
  </form>
</div>
