const sidebar = document.querySelector("aside");
const maxSidebar = document.querySelector(".max");
const miniSidebar = document.querySelector(".mini");
const roundout = document.querySelector(".roundout");
const maxToolbar = document.querySelector(".max-toolbar");
const logo = document.querySelector(".logo");
const content = document.querySelector(".content");
const moon = document.querySelector(".moon");
const sun = document.querySelector(".sun");

let chart;
document.addEventListener("DOMContentLoaded", function () {
    chart = Highcharts.chart("bar", {
        chart: {
            type: "bar",
        },
        title: {
            text: "Fruit Consumption",
        },
        xAxis: {
            categories: ["Apples", "Bananas", "Oranges"],
        },
        yAxis: {
            title: {
                text: "Fruit eaten",
            },
        },
        series: [
            {
                name: "Jane",
                data: [1, 0, 4],
            },
            {
                name: "John",
                data: [5, 7, 3],
            },
        ],
    });
});

new DataTable("#dataTables", {
    language: {
        url: "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json",
    },
});

function setDark(val) {
    if (val === "dark") {
        document.documentElement.classList.add("dark");
        moon.classList.add("hidden");
        sun.classList.remove("hidden");
    } else {
        document.documentElement.classList.remove("dark");
        sun.classList.add("hidden");
        moon.classList.remove("hidden");
    }
}

function openNav() {
    if (sidebar.classList.contains("-translate-x-48")) {
        // max sidebar
        sidebar.classList.remove("-translate-x-48");
        sidebar.classList.add("translate-x-none");
        maxSidebar.classList.remove("hidden");
        maxSidebar.classList.add("flex");
        miniSidebar.classList.remove("flex");
        miniSidebar.classList.add("hidden");
        maxToolbar.classList.add("translate-x-0");
        maxToolbar.classList.remove("translate-x-24", "scale-x-0");
        logo.classList.remove("ml-12");
        content.classList.remove("ml-12");
        content.classList.add("ml-12", "md:ml-60");
    } else {
        // mini sidebar
        sidebar.classList.add("-translate-x-48");
        sidebar.classList.remove("translate-x-none");
        maxSidebar.classList.add("hidden");
        maxSidebar.classList.remove("flex");
        miniSidebar.classList.add("flex");
        miniSidebar.classList.remove("hidden");
        maxToolbar.classList.add("translate-x-24", "scale-x-0");
        maxToolbar.classList.remove("translate-x-0");
        logo.classList.add("ml-12");
        content.classList.remove("ml-12", "md:ml-60");
        content.classList.add("ml-12");
    }
}
