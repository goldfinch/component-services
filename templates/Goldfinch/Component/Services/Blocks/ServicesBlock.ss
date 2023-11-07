<% if Items.Count %>
<div class="container">
    <div class="row justify-content-center my-5">

        <div class="col-md-8">
            <%-- Filter --%>
            <form>
                <div class="mb-3">
                    <label for="service-search-field" class="form-label">Search</label>
                    <input class="form-control" list="datalistOptions" id="service-search-field" placeholder="Search in services...">
                </div>
                <% if Categories %>
                <div class="mb-3">
                    <select class="form-select" aria-label="Services Categories">
                        <option selected>-</option>
                        <% loop Categories %>
                        <option value="$URLSegment">$Title</option>
                        <% end_loop %>
                    </select>
                </div>
                <% end_if %>
            </form>

            <div class="accordion" id="servicesblock-{$Top.ID}">
                <% loop Items %>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#servicesblock-{$Top.ID}-item-{$ID}" aria-expanded="false" aria-controls="servicesblock-{$Top.ID}-item-{$ID}">$Title</button>
                    </h2>
                <div id="servicesblock-{$Top.ID}-item-{$ID}" class="accordion-collapse collapse" data-bs-parent="#servicesblock-{$Top.ID}">
                    <div class="accordion-body"><a href="{$Link}">$Title</a></div>
                    </div>
                </div>
                <% end_loop %>
            </div>
        </div>

    </div>
</div>
<% end_if %>
