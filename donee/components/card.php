

<div class="content-card">

        <span class="rq-subcategory">
          <?php echo $row['subcategory']; ?>
        </span><br />

        <span class="rq-status">Approval
          <?php echo $row['approval']; ?>
        </span>

        <span class="rq-date">
          <?php echo $row['postedDate']; ?>
        </span>


        <div class="rq-button">
                    <span class="rq-category">
          <?php echo $row['subcategory']; ?>
        </span><br />
          <button class="rq-button view">View</button>
          <button class="rq-button delete">Delete</button>
        </div>
      </div>