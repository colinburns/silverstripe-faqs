        <% include Header %>
        <% include MainNavigation %>
        <% include Sidebar %>
        <div id="Content" class="typography">
            <div id="Breadcrumbs">$Breadcrumbs</div>
            <h1>{$MetaTitle}</h1>
            {$Content}
            <% if FAQs %>
                <h2>Questions & Answers</h2>
                <dl>
                    <% control FAQs %>
                        <dt>{$Pos}. <a href="#">$Question</a></dt>
                        <dd style="display:none;">$Answer</dd>
                    <% end_control %>
                </dl>
            <% else %>
                <blockquote>
                    <p>Unfortunately there are no Frequently Asked Questions at this time.</p>
                </blockquote>
            <% end_if %>
        </div>