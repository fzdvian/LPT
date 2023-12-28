  /* Login hide password */
  function togglePasswordVisibility() {
    const passwordField = document.getElementById("password");
    const showPasswordCheckbox = document.getElementById("showPassword");

    if (showPasswordCheckbox.checked) {
      passwordField.type = "text";
    } else {
      passwordField.type = "password";
    }
  }

  /* Burger navbar */
  const burger = document.querySelector(".burger");
  const navLinks = document.querySelector(".nav-links");

  burger.addEventListener("click", () => {
    navLinks.classList.toggle("active");
  });

  const navbar = document.querySelector(".navbar");

  /* Scroll navbar */
  window.addEventListener("scroll", function () {
    if (window.scrollY > 0) {
      navbar.classList.add("scrolled");
    } else {
      navbar.classList.remove("scrolled");
    }
  });
  var selectedRow = null;

  let prevScrollPos = window.pageYOffset;

  window.onscroll = function () {
    const currentScrollPos = window.pageYOffset;

    if (prevScrollPos > currentScrollPos) {
      document.getElementById(".navbar").style.top = "0";
    } else {
      document.getElementById(".navbar").style.top = "-50px";
    }

    prevScrollPos = currentScrollPos;
  };

  /* Tabel pengaduan */
  function onFormSubmit(e) {
    event.preventDefault();
    var formData = readFormData();
    if (selectedRow == null) {
      insertNewRecord(formData);
    } else {
      updateRecord(formData);
    }
    resetForm();
  }

  function readFormData() {
    var formData = {};
    formData["nopel"] = document.getElementById("nopel").value;
    formData["nama"] = document.getElementById("nama").value;
    formData["email"] = document.getElementById("email").value;
    formData["notelp"] = document.getElementById("notelp").value;
    formData["status"] = document.getElementById("status").value;
    formData["kategori"] = document.getElementById("kategori").value;
    formData["pesan"] = document.getElementById("pesan").value;

    return formData;
  }

  function insertNewRecord(record) {
    var table = document
      .getElementById("report")
      .getElementsByTagName("tbody")[0];
    var newRow = table.insertRow(table.length);
    cell3 = newRow.insertCell(0);
    cell3.innerHTML = record.nopel;
    cell1 = newRow.insertCell(1);
    cell1.innerHTML = record.nama;
    cell2 = newRow.insertCell(2);
    cell2.innerHTML = record.email;
    cell3 = newRow.insertCell(3);
    cell3.innerHTML = record.notelp;
    cell4 = newRow.insertCell(4);
    cell4.innerHTML = record.status;
    cell4 = newRow.insertCell(5);
    cell4.innerHTML = record.kategori;
    cell5 = newRow.insertCell(6);
    cell5.innerHTML = record.pesan;
    cell8 = newRow.insertCell(7);
    cell8.innerHTML = `<button onClick="onEdit(this)">Edit</button> <button onClick="onDelete(this)">Delete</button>`;
  }

  function onEdit(td) {
    selectedRow = td.parentElement.parentElement;
    document.getElementById("nopel").value = selectedRow.cells[0].innerHTML;
    document.getElementById("nama").value = selectedRow.cells[1].innerHTML;
    document.getElementById("email").value = selectedRow.cells[2].innerHTML;
    document.getElementById("notelp").value = selectedRow.cells[3].innerHTML;
    document.getElementById("status").value = selectedRow.cells[4].innerHTML;
    document.getElementById("kategori").value = selectedRow.cells[5].innerHTML;
    document.getElementById("pesan").value = selectedRow.cells[6].innerHTML;
  }

  function updateRecord(record) {
    selectedRow.cells[0].innerHTML = record.nopel;
    selectedRow.cells[1].innerHTML = record.nama;
    selectedRow.cells[2].innerHTML = record.email;
    selectedRow.cells[3].innerHTML = record.notelp;
    selectedRow.cells[4].innerHTML = record.status;
    selectedRow.cells[5].innerHTML = record.kategori;
    selectedRow.cells[6].innerHTML = record.pesan;
  }

  function onDelete(td) {
    if (confirm("Anda Yakin Ingin Menghapus Data Ini?")) {
      row = td.parentElement.parentElement;
      document.getElementById("report").deleteRow(row.rowIndex);
      resetForm();
    }
  }

  function resetForm() {
    document.getElementById("nopel").value = "";
    document.getElementById("nama").value = "";
    document.getElementById("email").value = "";
    document.getElementById("notelp").value = "";
    document.getElementById("status").value = "";
    document.getElementById("kategori").value = "";
    document.getElementById("pesan").value = "";
    selectedRow = null;
  }
