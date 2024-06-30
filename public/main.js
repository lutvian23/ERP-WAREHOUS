var token = $('meta[name="csrf-token"]').attr("content");

function alertSuccess(message) {
    $("#alert_success").append(`
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `);
}

async function pageLink(url) {
    await $.ajax({
        url: url,
        method: "GET",
        success: async function (response) {
            if (url === "http://localhost:8000/stock") {
                $("#content").load("/stock", () => {
                    $("#dashboard_stock_content").load("/home/stock");
                });
            } else {
                await $("#content").html(response);
            }
        },
        error: function (jqXHR, textStatus, errorThrow) {
            console.log(`Have error on prosess page: ${errorThrow}`);
        },
    });
}

if (!sessionStorage.getItem("initialLoad")) {
    sessionStorage.getItem("initialLoad", "true");
    pageLink("/stock");
    $.ajax({
        url: "/home/stock",
        method: "GET",
        success: function (response) {
            $("#dashboard_stock_content").html(response);
        },
        error: function (jqXHR, textStatus, errorThrow) {
            console.log(`error on index dashboardstock ${textStatus}`);
        },
    });
}
