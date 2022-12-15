<link rel="stylesheet" href="css/form.css"/>

<div class="form">
    <h1>Create a Request</h1>
    <form action="create-req.php" method="POST" id="reqForm" onsubmit="return isValidated()">

        <label for="category">Category</label>
        <select name="category" id="category" onchange="showSubcategory()" required>
            <option value="">Select a category</option>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row['ID'] ?>"> <?php echo $row['name'] ?></option>
                <?php
            }
            ?>
        </select>

        <?php
        $dryfood = [];
        $clothes = [];
        $stationary = [];
        foreach($subcategories as $subcategory) {
            if($subcategory['category'] == '1') {
                $dryfood[] = $subcategory;
            } else if($subcategory['category'] == '2') {
                $clothes[] = $subcategory;
            } else if($subcategory['category'] == '3') {
                $stationary[] = $subcategory;
            }
        }

        ?>
        
        <label for="subcategory" id="subcategory" style="display: none;">Subcategory</label>
        <select name="subcategorydryfood" id="subcategorydryfood" style="display: none;" >
            <option value="" >Select a subcategory</option>
            <?php
            foreach($dryfood as $subcategory) {
                ?>
                <option value="<?php echo $subcategory['subcategory'] ?>"> <?php echo $subcategory['subcategory'] ?></option>
                <?php
            }
            ?>
        </select>

        <select name="subcategoryclothes" id="subcategoryclothes" style="display: none;" >
            <option value="">Select a subcategory</option>
            <?php
            foreach($clothes as $subcategory) {
                ?>
                <option value="<?php echo $subcategory['subcategory'] ?>"> <?php echo $subcategory['subcategory'] ?></option>
                <?php
            }
            ?>
        </select>

        <select name="subcategorystationary" id="subcategorystationary" style="display: none;" >
            <option value="">Select a subcategory</option>
            <?php
            foreach($stationary as $subcategory) {
                ?>
                <option value="<?php echo $subcategory['subcategory'] ?>"> <?php echo $subcategory['subcategory'] ?></option>
                <?php
            }
            ?>
        </select>
        

        <label for="amount">Amount</label>
        <input type="number" name="amount" id="amount" placeholder="Amount" required>

        <select name="unit" id="unit" required>
            <option value="">Select Unit</option>
            <option value="kg">Kilograms</option>
            <option value="packet">Packets</option>
            <option value="pair">Pairs</option>
            <option value="items">Items</option>
        </select>

        <label for="urgency"> Urgency </label>
        <select name="urgency" id="urgency" required>
            <option value="">Select Urgency</option>
            <option value="1 Week">1 Week</option>
            <option value="2 Weeks">2 Weeks</option>
            <option value="1 Month">1 Month</option>
        </select>
        <label for="notes"> Notes </label>
        <textarea name="notes" id="notes" cols="30" rows="10" placeholder="Notes"></textarea>
        <div class="submit-button"><input type="submit" name="create-req" id="submit" value="Submit">
        </div>
    </form>
</div>