"use strict";

const KTAppEcommerceProducts = (() => {
  const initialize = () => {
    const tableElement = document.querySelector("#kt_ecommerce_products_table");

    if (tableElement) {
      const dataTable = $(tableElement).DataTable({
        info: false,
        order: [],
        pageLength: 10,
        columnDefs: [
          { render: DataTable.render.number(",", ".", 2), targets: 4 },
          { orderable: false, targets: 0 },
          { orderable: false, targets: 7 },
        ],
      });

      dataTable.on("draw", handleDraw);
      handleSearch(dataTable);
      handleStatusFilter(dataTable);
      handleDeleteRow();
    }
  };

  const handleDraw = () => {
    handleDeleteRow();
  };

  const handleSearch = (dataTable) => {
    const searchElement = document.querySelector(
      '[data-kt-ecommerce-product-filter="search"]'
    );
    searchElement.addEventListener("keyup", (event) => {
      dataTable.search(event.target.value).draw();
    });
  };

  const handleStatusFilter = (dataTable) => {
    const statusFilterElement = document.querySelector(
      '[data-kt-ecommerce-product-filter="status"]'
    );
    $(statusFilterElement).on("change", (event) => {
      let status = event.target.value;
      status === "all" && (status = "");
      dataTable.column(6).search(status).draw();
    });
  };

  const handleDeleteRow = () => {
    const deleteButtons = document.querySelectorAll(
      '[data-kt-ecommerce-product-filter="delete_row"]'
    );
    deleteButtons.forEach((button) => {
      button.addEventListener("click", handleDeleteClick);
    });
  };

  const handleDeleteClick = (event) => {
    event.preventDefault();
    const rowElement = event.target.closest("tr");
    const productName = rowElement.querySelector(
      '[data-kt-ecommerce-product-filter="product_name"]'
    ).innerText;

    Swal.fire({
      text: `Are you sure you want to delete ${productName}?`,
      icon: "warning",
      showCancelButton: true,
      buttonsStyling: false,
      confirmButtonText: "Yes, delete!",
      cancelButtonText: "No, cancel",
      customClass: {
        confirmButton: "btn fw-bold btn-danger",
        cancelButton: "btn fw-bold btn-active-light-primary",
      },
    }).then((result) => {
      if (result.value) {
        Swal.fire({
          text: `You have deleted ${productName}!`,
          icon: "success",
          buttonsStyling: false,
          confirmButtonText: "Ok, got it!",
          customClass: {
            confirmButton: "btn fw-bold btn-primary",
          },
        }).then(() => {
          const dataTable = $(rowElement).closest("table").DataTable();
          dataTable.row(rowElement).remove().draw();
        });
      } else if (result.dismiss === "cancel") {
        Swal.fire({
          text: `${productName} was not deleted.`,
          icon: "error",
          buttonsStyling: false,
          confirmButtonText: "Ok, got it!",
          customClass: {
            confirmButton: "btn fw-bold btn-primary",
          },
        });
      }
    });
  };

  return {
    init: initialize,
  };
})();

KTUtil.onDOMContentLoaded(() => {
  KTAppEcommerceProducts.init();
});
