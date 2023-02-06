export default {
    template: `<main>
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Корзина</h1>
    </div>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Название товара</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">200р.<small class="text-muted fw-light"> &times; 2
                        шт.</small></h1>
                    <p>Описание товара Описание товара Описание товара Описание товара Описание товара Описание
                        товара</p>

                    <button type="button" class="btn btn-lg btn-info mb-3">+</button>
                    <button type="button" class="btn btn-lg btn-warning mb-3">&minus;</button>
                    <button type="button" class="btn btn-lg btn-outline-danger mb-3">Удалить из корзины</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Название товара</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">100р.<small class="text-muted fw-light"> &times; 1
                        шт.</small></h1>
                    <p>Описание товара Описание товара Описание товара Описание товара Описание товара Описание
                        товара</p>
                    <button type="button" class="btn btn-lg btn-info mb-3">+</button>
                    <button type="button" class="btn btn-lg btn-warning mb-3">&minus;</button>
                    <button type="button" class="btn btn-lg btn-outline-danger mb-3">Удалить из корзины</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Название товара</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">300р.<small class="text-muted fw-light"> &times; 3
                        шт.</small></h1>
                    <p>Описание товара Описание товара Описание товара Описание товара Описание товара Описание
                        товара</p>
                    <button type="button" class="btn btn-lg btn-info mb-3">+</button>
                    <button type="button" class="btn btn-lg btn-warning mb-3">&minus;</button>
                    <button type="button" class="btn btn-lg btn-outline-danger mb-3">Удалить из корзины</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center gap-1">
        <h2 class="mb-5">Итоговая стоимость: 600р.</h2>
        
        <router-link class="col-6 btn btn-lg btn-outline-info mb-3" to="/">Назад</router-link>
        <button type="button" class="col-6 btn btn-lg btn-primary mb-3">Оформить заказ</button>

    </div>
</main>`
}