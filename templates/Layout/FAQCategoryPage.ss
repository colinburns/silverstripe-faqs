		<div id="Content">
                    <div id="MainColumn" class="typography">
                        <div id="Breadcrumbs">$Breadcrumbs</div>
                        $Content
                        <% if GetFAQs %>
                            <h3>Questions & Answers</h3>
                            <dl>
                                <% control GetFAQs %>
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
                    <div style="clear:both;"></div>
		</div>