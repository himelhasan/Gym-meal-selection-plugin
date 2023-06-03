jQuery(document).ready(function ($) {
  const form = document.getElementById("multistep-form");
  const prevBtns = form.querySelectorAll(".prev-btn");
  const nextBtns = form.querySelectorAll(".next-btn");
  const submitBtn = form.querySelector('button[type="submit"]');
  const formResults = document.getElementById("form-results");
  const breakfastResult = document.getElementById("breakfast-result");
  const lunchResult = document.getElementById("lunch-result");
  const dinnerResult = document.getElementById("dinner-result");

  let currentStep = 0;

  function showStep(step) {
    const fieldsets = form.querySelectorAll("fieldset");
    fieldsets.forEach(function (fieldset, index) {
      if (index === step) {
        fieldset.classList.add("show");
      } else {
        fieldset.classList.remove("show");
      }
    });

    if (step === 0) {
      prevBtns.forEach(function (btn) {
        btn.style.display = "none";
      });
    } else {
      prevBtns.forEach(function (btn) {
        btn.style.display = "inline-block";
      });
    }

    if (step === fieldsets.length - 1) {
      nextBtns.forEach(function (btn) {
        btn.style.display = "none";
      });
      submitBtn.style.display = "inline-block";
    } else {
      nextBtns.forEach(function (btn) {
        btn.style.display = "inline-block";
      });
      submitBtn.style.display = "none";
    }
  }

  function collectFormData() {
    const formData = {
      breakfast: getSelectedValue("breakfast"),
      lunch: getSelectedValue("lunch"),
      dinner: getSelectedValue("dinner"),
    };
    return formData;
  }

  function getSelectedValue(name) {
    const radio = form.querySelector('input[name="' + name + '"]:checked');
    if (radio) {
      const option = {
        name: radio.getAttribute("data-title"),
        link: radio.getAttribute("data-link"),
      };
      return option;
    }
    return null;
  }

  function loadPostOptions(fieldId, postType) {
    $.ajax({
      url: ajaxurl,
      type: "POST",
      data: {
        action: "load_post_options",
        post_type: postType,
      },
      success: function (response) {
        const container = document.getElementById(fieldId);
        container.innerHTML = response;

        const checkboxes = container.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function (checkbox) {
          const recipeTitle = checkbox.getAttribute("data-title");
          checkbox.labels[0].textContent = recipeTitle;
        });
      },
    });
  }

  form.addEventListener("submit", function (event) {
    event.preventDefault();
    const formData = collectFormData();
    console.log(formData);
    const selectedBreakfast = formData.breakfast
      ? '<a href="' + formData.breakfast.link + '">' + formData.breakfast.name + "</a>"
      : "No breakfast selected";
    const selectedLunch = formData.lunch
      ? '<a href="' + formData.lunch.link + '">' + formData.lunch.name + "</a>"
      : "No lunch selected";
    const selectedDinner = formData.dinner
      ? '<a href="' + formData.dinner.link + '">' + formData.dinner.name + "</a>"
      : "No dinner selected";
    breakfastResult.innerHTML = selectedBreakfast;
    lunchResult.innerHTML = selectedLunch;
    dinnerResult.innerHTML = selectedDinner;
    console.log(breakfastResult);
    console.log(lunchResult);
    console.log(dinnerResult);
    form.style.display = "none";
    formResults.style.display = "block";
  });

  nextBtns.forEach(function (btn) {
    btn.addEventListener("click", function () {
      currentStep++;
      showStep(currentStep);
    });
  });

  prevBtns.forEach(function (btn) {
    btn.addEventListener("click", function () {
      currentStep--;
      showStep(currentStep);
    });
  });

  showStep(currentStep);

  // Define the ajaxurl variable
  const ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";

  loadPostOptions("breakfast-options", "breakfast");
  loadPostOptions("lunch-options", "lunch");
  loadPostOptions("dinner-options", "dinner");
});
jQuery(document).ready(function ($) {
  // Show the next step and hide the current step
  function showNextStep() {
    var currentStep = $(this).closest("fieldset.step");
    var nextStep = currentStep.next("fieldset.step");
    currentStep.hide();
    nextStep.show();
  }

  // Show the previous step and hide the current step
  function showPreviousStep() {
    var currentStep = $(this).closest("fieldset.step");
    var previousStep = currentStep.prev("fieldset.step");
    currentStep.hide();
    previousStep.show();
  }

  // Update the form results based on the selected options
  function updateFormResults() {
    var breakfastSelection = $('input[name="breakfast"]:checked').next("label");
    var lunchSelection = $('input[name="lunch"]:checked').next("label");
    var dinnerSelection = $('input[name="dinner"]:checked').next("label");
    var snacks1Selection = $('input[name="snacks1"]:checked').next("label");
    var snacks2Selection = $('input[name="snacks2"]:checked').next("label");
    var snacks3Selection = $('input[name="snacks3"]:checked').next("label");

    var breakfastText = breakfastSelection.text();
    var breakfastImage = breakfastSelection.find("img").attr("src");
    var breakfastLink = breakfastSelection.find("a").attr("href");

    var lunchText = lunchSelection.text();
    var lunchImage = lunchSelection.find("img").attr("src");
    var lunchLink = lunchSelection.find("a").attr("href");

    var dinnerText = dinnerSelection.text();
    var dinnerImage = dinnerSelection.find("img").attr("src");
    var dinnerLink = dinnerSelection.find("a").attr("href");

    var snacks1Text = snacks1Selection.text();
    var snacks1Image = snacks1Selection.find("img").attr("src");
    var snacks1Link = snacks1Selection.find("a").attr("href");

    var snacks2Text = snacks2Selection.text();
    var snacks2Image = snacks2Selection.find("img").attr("src");
    var snacks2Link = snacks2Selection.find("a").attr("href");

    var snacks3Text = snacks3Selection.text();
    var snacks3Image = snacks3Selection.find("img").attr("src");
    var snacks3Link = snacks3Selection.find("a").attr("href");

    $("#breakfast-result").html(
      `<div class="card">
      <div class="imgBox">
        <img src="${breakfastImage}" alt="${breakfastText}" />
      </div>
      <h2 class="title">
        <a href="${breakfastLink}">${breakfastText}</a>
      </h2>
    </div>`
    );
    $("#lunch-result").html(
      `<div class="card">
      <div class="imgBox">
        <img src="${lunchImage}" alt="${lunchText}" />
      </div>
      <h2 class="title">
        <a href="${lunchLink}">${lunchText}</a>
      </h2>
    </div>`
    );
    $("#dinner-result").html(
      `<div class="card">
      <div class="imgBox">
        <img src="${dinnerImage}" alt="${dinnerText}" />
      </div>
      <h2 class="title">
        <a href="${dinnerLink}">${dinnerText}</a>
      </h2>
    </div>`
    );
    $("#snacks1-result").html(
      `<div class="card">
      <div class="imgBox">
        <img src="${snacks1Image}" alt="${snacks1Text}" />
      </div>
      <h2 class="title">
        <a href="${snacks1Link}">${snacks1Text}</a>
      </h2>
    </div>`
    );
    $("#snacks2-result").html(
      `<div class="card">
      <div class="imgBox">
        <img src="${snacks2Image}" alt="${snacks2Text}" />
      </div>
      <h2 class="title">
        <a href="${snacks2Link}">${snacks2Text}</a>
      </h2>
    </div>`
    );
    $("#snacks3-result").html(
      `<div class="card">
      <div class="imgBox">
        <img src="${snacks3Image}" alt="${snacks3Text}" />
      </div>
      <h2 class="title">
        <a href="${snacks3Link}">${snacks3Text}</a>
      </h2>
    </div>`
    );
  }

  // Bind the click event handlers
  $(".next-btn").click(showNextStep);
  $(".prev-btn").click(showPreviousStep);
  $("#multistep-form").submit(updateFormResults);
});
