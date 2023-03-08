<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Documentary\Documentary;
class DocumentarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Documentary::create([
            'documentary_title'   => 'Offer letter (dummy)',
            'documentary_content' => '
                <table class="table w-100">
                    <tbody>
                        <tr>
                            <td style="width:90%">
                                <h3 class="h3"> $project_name </h3>
                            </td>
                            <td style="width:10%">
                                $logo_image_with_url
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 15px;">Offer: $offer_number  Revision: $rev_number,
                                <br>
                                <br>
                                <strong style="font-size: 15px;"> To</strong><br>
                                <strong style="font-size: 15px;">$contact_person</strong><br>
                                <strong style="font-size: 15px;">$customer_organization_no</strong><br>
                            </td>
                            <td style="width:150px" style="font-size: 15px;">Date: $today_date</td>
                        </tr>
                        <tr>
                            <td style="font-size: 15px;" style="font-size: 15px;">Our ref: $admin_name</td>
                            <td style="font-size: 15px;">Your ref: </td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong style="font-size: 20px;">Re.: $document_title</strong></td>
                        </tr>
                        <tr>
                            <td  colspan="2">
                                <strong style="font-size: 17px;">1. Leveransepris</strong>
                                <ol>
                                    <li style="font-size: 15px;">We thank you for your request and hereby send offers for the provision of engineering services for concrete elements as directed in their attached documents by e-mail of $today_date The project for item delivery is <strong>Viganeset</strong>.</li>
                                    <li style="font-size: 15px;">Chapter 2 below indicates delivery that applies to the price given. We understand that staircases are not included in the price, and that you get hole decks for roofs from others. Thus, hole cover also expires from the delivery. But global statics are to be included. The total price for the delivery of engineering documentation and the relevant project coordination of engineering work are: <strong> $calculated_total_price kr + mva</strong></li>
                                    <li style="font-size: 15px;">Pris for sideman control is included and responsibility is accepted for RIB engineering of elements with respect to solutions and static strength for all components specified.</li>
                                    <li style="font-size: 15px;">All prices are exclusive of VAT.</li>
                                </ol>
                            </td>
                        </tr>
                        <tr>
                            <td  colspan="2">
                                <strong style="font-size: 17px;">2. Leveransebeskrivelse</strong>
                                <p style="font-size: 15px;">The delivery includes all digital production drawings for items specified in the delivery price table.</p>
                                <p style="font-size: 15px;">Structures for documented calculations</p>
                                <ol>
                                    <li style="font-size: 15px;">Veggelementer</li>
                                    <li style="font-size: 15px;">Internal Firewall</li>
                                </ol>
                                <p style="font-size: 15px;">Digital produksjonstegninger</p>
                                <ol>
                                    <li style="font-size: 15px;">Produksjonstegninger</li>
                                    <li style="font-size: 15px;">All necessary details</li>
                                    <li style="font-size: 15px;">Structure drawings of all elements</li>
                                    <li style="font-size: 15px;">Production drawings of all elements</li>
                                    <li style="font-size: 15px;">Montasjetegninger</li>
                                </ol>
                            </td>                                    
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p><strong style="font-size: 17px;">3.  Prerequisites, avtale and delivery plan </strong></p> 
                                <p><strong style="font-size: 17px;">3.1  Prerequisites for offers </strong></p> 
                                <p style="font-size: 15px;">The offer is based on some assumptions/caveats as follows. If these assumptions are not proved to be true, or otherwise fail or prove incorrect, this may lead to adjustments in progress/fulfilment of the deadlines for consequences from the Purchase Order that are to be perceived as the agreement in this context.</p><br>
                                <p style="font-size: 15px;">The following assumptions are specified in connection with the offer:</p>
                                <ol>
                                    <li style="font-size: 15px;">Agreed project implementation plan - It is therefore assumed that we arrive at an agreed progress plan that is feasible for both parties.  AECPrefab needs 4-5 weeks from the agreed start-up until we can deliver the product digitally. The pleas agree on a decision plan that has realistic deadlines for feedback and/or confirmation of factors that AECPrefab needs to clarify in order to maintain the production of drawings and elements  safely in accordance with the agreed progress plan.   It should be added a couple of weeks for slack in relation to this. So 8 weeks of production time looks like a good plan on our part.</li>
                                    <li style="font-size: 15px;">Information about existing buildings - It is assumed that TB will receive an IFC model and sufficient information about existing buildings, including structural details, for modeling the concrete structure and performing static calculations.  This means that reports from previous works are made available to AECPrefab so that we can ensure power transmissions in a prudent manner.</li>
                                    <li style="font-size: 15px;">Payment plan - AECPrefab assumes that a agreed payment plan is reached that involves 50% in advance, 50% after completing the assignment, 30 days payment plan. Any changes must be clarified especially along the way.</li>
                                    <li style="font-size: 15px;">The caveats and provisions contained in this offer are repeated in the Purchase Order which, upon signing, applies as an agreement for the assignment.</li>
                                </ol>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong style="font-size: 17px;">3.2  Duration of offer and confirmation</strong>
                                <p>Offer valid until 14 days from today date. If they wish to accept the offer we ask that they confirm this in writing by email before the end of this time.</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong style="font-size: 17px;">3.3  Leveranseplan</strong>
                                <p style="font-size: 15px;">The start date  of the design assignment is set by the signature of purchase orders that form the basis for our production planning.  An internal progress plan is drawn up for the assignment, in accordance with the aforementioned agreed project execution plan (Egersund Betongteknikk sin project plan) and the assignment then goes into our production plan.</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong style="font-size: 17px;">4. Attachment to offer</strong>
                                <p style="font-size: 15px;">Nobody</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>
                                    For AECPrefab AS <br><br>
                                    Sincerely,<br>
                                    Sigbjørn Daasvatn <strong style="font-size: 15px;">$admin_name</strong><br>
                                    General Manager <strong style="font-size: 15px;">$admin_role</strong>  <br>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            ',
            'is_active' => 1
        ]);
    }
}
