// pay
let chairs = document.querySelectorAll(".chair ul li input[type='checkbox']")
let chairSelect = document.querySelector(".info-film .room-film span")
let priceChair = document.querySelectorAll(".chair ul li input[type='hidden']")
let selectedChairPriceElement = document.getElementById("selected-chair-price")
let priceBill = document.querySelector(".content-bill .price-film input")

let countChair = 0
let sumChair = 0
let sumPrice = 0

chairs.forEach((chair, index) => {
    chair.addEventListener("click", () => {
        if (chair.style.background !== "rgb(43, 212, 43)") {
            chair.style.background = "rgb(43, 212, 43)"
            countChair++
            chairSelect.innerHTML += chair.value + " "
            const chairPrice = priceChair[index].value
            sumPrice += parseFloat(chairPrice)
            priceBill.value = sumPrice
            selectedChairPriceElement.innerHTML = sumPrice + " VND"
            // console.log(priceBill.value)
        } else {
            chair.style.background = "#001232"
            countChair--

            const selectedChairs = chairSelect.innerHTML.split(" ")
            const chairIndex = selectedChairs.indexOf(chair.value)
            if (chairIndex !== -1) {
                selectedChairs.splice(chairIndex, 1)
                chairSelect.innerHTML = selectedChairs.join(" ") + " "
            }

            const chairPrice = priceChair[index].value
            sumPrice -= parseFloat(chairPrice)
            priceBill.value = sumPrice
            selectedChairPriceElement.innerHTML = sumPrice + " VND"
            // console.log(priceBill.value)
        }
        sumChair = countChair
    })
})