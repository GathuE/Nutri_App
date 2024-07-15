<?php 
//$conn = mysqli_connect('localhost','root','');
//mysqli_select_db($conn,'app');
// Include the main TCPDF library (search for installation path)
include('tcpdf/tcpdf.php');

// create new PDF document
ob_start();
$pdf = new TCPDF('P','mm','A4');
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
$pdf->SetMargins(15, 10, 15, true);
$pdf->SetAutoPageBreak(true, 15);
$pdf->AddPage();

//Logo Part
$html .='<table cellspacing="0" style=" fontweight:bold;font-size:9px;color:#421966; line-height:15px; width:100%;">
        <tr style="margin-bottom:30px;">
            <td style="text-align:left;"><img src="assets/img/buni.png" style="padding:30px;border-radius:10px;height:100px;"></td>
            <td style="text-align:right;"></td>
            <td style="text-align:right;"><b style="font-size:15px;">Emmanuel Gathu</b> <br> Tel : <b>0711530740</b> <br> Email : <b>gathuimmanuel@gmail.com</b>  <br> Website : <b>www.yoururl.com</b></td>
        </tr>';
$html .='</table>';


$html .='<table cellspacing="0" style=" fontweight:bold;font-size:9px;color:#421966; line-height:15px; width:100%;text-align:justify;">
            <hr style="color:#138ea4;">
            <h3 style="text-align:center;color:#138ea4;;">Our Terms and Conditions.</h3>
            
            <h5>1.Your Acceptance</h5>
            <p>The following terms and conditions and website terms of use relate to the provision of any services or sale of products (including downloadable material) from the Emmanuel Gathu website <b>(http://yoururl.com)</b> or from us personally (together, “Services”) (“Terms and Conditions of Use”). These Terms and Conditions of Use constitute an agreement between Emmanuel Gathu (“us”, “we”, “our”), the owner and operator of the Site and any Services, and you (“you”, “your” or “user(s)”), a user of the Site and/or Services (“Agreement”).</p>
            <p>By using our Site and/or any Services you agree to be bound by this Agreement, and our Privacy Policy. We may amend this Agreement or our Privacy Policy and will notify you if we do so. If you do not agree to the terms and conditions contained in this Agreement or our Privacy Policy (or any subsequent amendments) you must cease using our Site and Services immediately.</p>
            <p>Users must be 18 years or older to purchase any of our products or Services.</p>

            <h4 style="text-align:center;">PART A: USE OF OUR SERVICES</h4>


            <h5 style="color:#138ea4;">2.The Scope of our Professional Nutrition and Dietetics Services</h5>
            <ul>
                <li>We are Kenyan Registered Clinical Nutritionists and Dietitians who give specialized Nutrition Services only. Standards of professional practice in Nutrition and Dietetics are governed by Kenya Nutrition and Dietetics Institute.</li>
                <li>The degree of benefit obtainable from our Professional Nutrition and Dietetics Services may vary between clients with similar nutrition goals and following a similar nutrition plan.</li>
                <li>Our Professional Nutrition and Dietetics Services are tailored to support nutrition related conditions and/or diet concerns identified and agreed between both parties.</li>
                <li>Our Professional Nutrition and Dietetics Services DO NOT claim to diagnose, treat any medical conditions.</li>
                <li>Our Professional Nutrition and Dietetics Services is not a substitute for medical treatment. But may COMPLIMENT it.</li>
                <li>Our Professional Nutrition and Dietetics Services may recommend food supplements as part of reaching your Nutrition and Dietetics goals.</li>
            </ul>


            <h5>3.Our Reliance on Your Accuracy of Information</h5>
            <ul>
                <li>You are responsible for making your own inquiries and seeking independent advice from your healthcare professional.</li>
                <li>You acknowledge that Our Professional Nutrition and Dietetics Services are provided on the basis of the accuracy and completeness of the information that you provide us, following our evaluation of that information. You further acknowledge that your failure to provide accurate or complete information may adversely affect the quality, efficacy or suitability of these Services.</li>
                <li>You warrant the truth, accuracy, currency and completeness of any information you provide us.</li>
            </ul>


            <h5>4.Nutritional Information</h5>
            <ul>
                <li>We make healthy diet plans by calculating detailed nutrient composition of Kenyans most common mixed dishes borrowed from Kenya Food Composition Table of 2018, some taken from food labels, or calculated using a recipe approach. We use (I.O.M. 2006) and other relevant predictive equations to estimate individualized nutrients requirements. We however, don’t give any warranty that the nutrition information is free from error.</li>
                <li>Nutrition and Dietetics information provided on our Site and/or provided via our Services is based on extensive nutrition research. Before relying on any nutritional information on our Site and/or provided via our Services, you should carefully evaluate the accuracy, completeness and relevance of this information to your purposes and nutrition particularities, and consider the need to obtain appropriate expert advice relevant to your circumstances. </li>
            </ul>


            <h5>5.Personal Information</h5>
            <ul>
                <li>We are required to collect such personal information from you as reasonably required to provide you with our Services, and in accordance with our Privacy Policy. This information may include your personal details such as name, email address together with certain health information; not limited to your age, height, weight, exercise levels, biochemistry, medical history, medication and supplement use. We acknowledge and agree that this information is confidential and will be used for the purposes of the provision of our Services only, unless otherwise required by law as set out in our Privacy Policy.</li>
                <li>You warrant the personal information and health information you provide us is truthful, accurate, current and complete to the best of your knowledge or belief. We accept no liability in the event you fail to provide us with personal information or health information that is truthful, accurate, current and complete.</li>
                <li>By agreeing to the terms and conditions contained in this Agreement you agree to receive our email newsletter. You can unsubscribe at any time by emailing us at with ‘unsubscribe’ in your email’s subject.</li>
            </ul>


            <h5>6.User Accounts</h5>
            <ul>
                <li>We may assign you a username/password and account information in order to enable you to access and use certain areas of our Site or require you to set up your own account access using a username/password chosen by you (“Login”). Each time you use your Login, you will be deemed to be authorised to access and use our Site in a manner consistent with this Agreement. We have no obligation to investigate the authorization or source of any such access or use of our Site.</li>
                <li>You are solely responsible for protecting the security and confidentiality of your Login and for all activities on our Site using that Login, including without limitation, all communications and transmissions and all obligations (including without limitation financial obligations) incurred on our Site through such access or use of your Login.</li>
                <li>You must immediately notify us of any unauthorised use of your Login or any other breach or threatened breach of our Site’s security you may be aware of.</li>
            </ul>


            <h5>7.Bookings, Cancellations</h5>
            <ul>
                <li>Any appointment bookings made with us require a minimum of 48 hours’ notice of cancellation during business days to be eligible for a full refund should you wish to cancel your appointment. If you wish to change your appointment time, we require a minimum of 48 hours’ notice during business days.</li>
                <li>Your rights to refund or replacement (if applicable) in respect of our Services are as prescribed. In the event of any defect with the Services (including any products) that you have purchased on or through our Site, your remedies will be as prescribed and liability will be limited to replacement of the Services (including any products) in question (where applicable), or refund to the value of those Services (or goods). If you believe any of the Services including any products purchased on or through our Site contain a defect, you must notify us immediately by email.</li>
            </ul>


            <h5>8.Contact Information</h5>
            <ul>
                <li>If you have any questions or concerns about your order or if you have any questions about our products or Services do not hesitate to contact us. You may contact us by email.</li>
            </ul>

            <h4 style="text-align:center;">PART B: WEBSITE TERMS OF USE</h4>

            <h5>9.Specific Warnings</h5>
            <ul>
                <li>You must not access or use our Site (a) in a way that violates these Terms and Conditions of Use, (b) for unlawful activities or purposes, (c) in a way that is fraudulent, inaccurate, false, misleading or deceptive, (d) in a way that violates any applicable law (including, without limitation, applicable privacy laws) or (e) in a way that infringes the rights (including our intellectual property rights, as described below) of any other person. You must take your own precautions to ensure that the process which you employ for accessing our Site does not expose you to the risk of viruses, malicious computer code or other forms of interference which may damage your own computer system. For the removal of doubt, we do not accept responsibility for any interference or damage to your own computer system which arises in connection with your use of our Site or any linked or third-party website (“Third Party Website”). Whilst we have no reason to believe that any information contained on our Site is inaccurate, we do not warrant the accuracy, adequacy or completeness of such information, nor do we undertake to keep our Site updated. Responsibility for the content of advertisements appearing on our Site (including hyperlinks to advertisers’ own websites) rests solely with the advertisers. The placement of such advertisements does not constitute a recommendation or endorsement by us of the advertisers’ products and each advertiser is solely responsible for any representations made in connection with its advertisement.</li>
            </ul>


            <h5>10.Copyright</h5>
            <p>Unless otherwise indicated, copyright and other intellectual property rights in our Site (including text, graphics, photographs, logos, icons, domain names, service marks, information, design, sound recordings and software) and copyright in all electronic products including eBooks and any other downloadable material is owned or licensed by us. Other than for the purposes of, and subject to the conditions prescribed under, the Copyright act and similar legislation, and except as expressly authorised by these Terms and Conditions of Use, you may not in any form or by any means:</p>
            <ul>
                <li>adapt, reproduce, store, distribute, print, display, perform, publish or create derivative works from any part of our Site or any of our electronic products or downloadable material; or</li>
                <li>commercialise any information, products or services obtained from any part of our Site or any of our electronic products or downloadable material, without our written permission.</li>
                <li>Emmanuel Gathu reserves all rights not expressly granted in and to the Service and the Site. You agree to not engage in the use, copying, or distribution of anything contained within the Site or Service unless we have given express written permission.</li>
                <li>By uploading, transmitting, posting or otherwise making available any material via the Site and associated social media platforms, including providing us with any comments, feedback, ideas or suggestions, you grant us a non-exclusive, worldwide, royalty-free, perpetual license to use, reproduce, edit and exploit the material in any form and for any purpose, and unconditionally waive all moral rights as defined by the Copyright Act.</li>
            </ul>


            <h5>11.Our License Grant to You.</h5>
            <ul>
                <li>We make our Services available to you through our Site. When you use our Services, we grant you a personal, non-exclusive, revocable, limited licence to use our Services and access our Site. This means you may not resell our Services anywhere else, share your licence to use our Services with anyone else, reverse engineer, decompile, modify or otherwise attempt to copy our Service.</li>
                <li>This licence may be terminated if you violate any provisions listed in these Terms and Conditions of Use, or our Privacy Policy. Additionally, this license may be terminated if you are engaged in any activities that may damage the rights of Emmanuel Gathu or if your activities are in violation of any applicable laws. If you wish to terminate this license you should stop using our Service and accessing our Site or notify us.</li>
            </ul>
          


            <h5>12.Use of Our Site: Restricted Use</h5>
            <ul>
                <li>When using our Site or Services, you are responsible for your use and for any use of our Site or Services made using your device. You also agree that your use of our Site or Services is for personal non-commercial use. You agree not to access, copy, or otherwise use our Site or Services, including our intellectual property and trademarks, except as authorised by these Terms and Conditions of Use or as otherwise authorised in writing by us.  Unless we agree otherwise in writing, you are provided with access to our Site only for your personal use. You may not without our written permission on-sell information obtained from our Site.</li>
                <p>You agree:</p>
                <ul>
                    <li>You will not copy, distribute or disclose any part of the Site or the Service in any medium, including without limitation by any automated or non-automated “scraping”;</li>
                    <li>You will not attempt to interfere with, compromise the system integrity or security, or decipher any transmissions to or from the servers running the Site or Service;</li>
                    <li>You will not take any action that imposes, or may impose at our sole discretion, an unreasonable or disproportionately large load on our infrastructure;</li>
                    <li>You will not collect or harvest any personally identifiable information, including account names, from the Service;</li>
                    <li>You will not stalk, harass, bully or harm another individual who uses our Site or Service;</li>
                    <li>You will not upload, post, transmit or otherwise make available any material that:</li>
                    <ol>
                        <li>is not your original work, or which may infringe the intellectual property or other rights of another person;</li>
                        <li>is, or could reasonably be expected to be, defamatory, obscene, offensive, threatening, abusive, pornographic, vulgar, profane, indecent or otherwise unlawful, including material that racially or religiously vilifies, incites violence or hatred, or is likely to offend, insult or humiliate others based on race, religion, ethnicity, gender, age, sexual orientation or any physical or mental disability;</li>
                        <li>includes an image or personal information of another person unless you have their consent;</li>
                        <li>you know or suspect, or should reasonably know or suspect, to be false, misleading or deceptive;</li>
                        <li>contains large amounts of untargeted, unwanted or repetitive content; or</li>
                        <li>contains financial, legal, medical or other professional advice.</li>
                    </ol>
                    <li>You will not impersonate any person or entity or misrepresent your affiliation with a person or entity;</li>
                    <li>You will not hold Emmanuel Gathu responsible for your use of our Site;</li>
                    <li>You will not violate any requirements, procedures, policies or regulations of networks connected to Emmanuel Gathu;</li>
                    <li>You will not interfere with or disrupt the Site or Service;</li>
                    <li>You will not hack, spam or phish us or other users</li>
                    <li>You will provide truthful and accurate content;</li>
                    <li>You will not violate any law or regulation and you are responsible for such violations;</li>
                    <li>You will not use our Site to post any false, misleading, unlawful, defamatory, obscene, invasive, threatening, harassing, inflammatory, fraudulent content;</li>
                    <li>You will not cause, or aid in, the destruction, manipulation, removal, disabling, or impairment of any portion of our Site, including the de-indexing or de-caching of any portion of our Site from a thirty party’s website, such as by requesting its removal from a search engine; and</li>
                    <li>You will not upload any content to our Site that includes any third-party intellectual property unless you have permission from the owner to use it in the specific manner that you used it.</li>
                </ul>
                <p>If you believe that a user has breached any of the above conditions, please contact us at Emmanuel Gathu.</p>
                <ul>
                    <li>We reserve the right to refuse service, block or suspend any user of the website, and to modify or remove any material uploaded, posted, transmitted or otherwise made available on the website by any user, without prior notice.</li>
                    <li>We are not responsible for, and accept no liability with respect to, any material uploaded, posted, transmitted or otherwise made available on the website by any person other than us. We do not endorse any opinion, advice or statement made by any person other than us.</li>
                    <li>You agree to indemnify us and each of our officers, employees, agents, contractors, suppliers and licensors (collectively, Affiliates) in respect of any liability, loss or damages (including all legal and other costs on a full indemnity basis) suffered or incurred by them arising (in whole or part) out of the breach of or failure to comply with any of these Terms and Conditions of Use, or any other default or wrongful conduct in relation to the subject matter of these Terms and Conditions of Use, on the part of you or any of your Affiliates.</li>
                </ul>
            </ul>


            <h5>13.Modification of Service</h5>
            <ul>
                <li>We reserve the right to alter, update, or remove our Site at any time. We may conduct such modifications to our Site for security reasons, intellectual property or other legal reasons, or various other reasons at our discretion, and we are not required to explain such modifications. For example, we may provide updates to fix security flaws, or respond to legal demands. Please note that this is a non-binding illustration of how we might exercise our rights under this section, and nothing in this section obligates us to take measures to update the Site for security, legal or other purposes.</li>
                <li>We do not guarantee that the Site will always be available, work, or be accessible at any particular time. Only users who are eligible to use our Site or Service may do so. We reserve the right to terminate access for anyone</li>
            </ul>


            <h5>14.Disclaimers</h5>
            <ul>
                <li>To the fullest extent permissible by applicable law, we hereby disclaim all warranties of any kind, either express or implied, including, any implied warranties with respect to the Services (including any products listed or purchased on or through our Site. We hereby expressly disclaim all liability for our Service, and for product defects or failures, claims that are due to your use of our Service or products, product misuse, abuse, product modification, improper product selection, non-compliance with any codes, or misappropriation. The foregoing exclusions of implied warranties do not apply to the extent prohibited by law. </li>
            </ul>


            <h5>15.Limitations and Liability</h5>
            <ul>
                <li>Notwithstanding any limitations or restrictions placed on this limitation of liability, we do not assume any responsibility or liability for any damages to you. In no event will we, or any of our respective officers, directors, employees, shareholders, affiliates, agents, successors or assigns, nor any party involved in the creation, production or transmission of this Site or any Services offered, be liable to you or anyone else for any direct, indirect, special, punitive, incidental or consequential damages arising out of the use, inability to use, or the results of use of this Site, any web sites linked to this Site, or the materials, information or services contained on any or all such web sites, whether based on warranty, contract, tort or any other legal theory and whether or not advised of the possibility of such damages. The foregoing limitations of liability do not apply to the extent prohibited by law. </li>
                <li>For the purposes of the following clause, in addition to the defined terms above “Consequential Loss” means any loss or damage suffered by a party or any other person that is indirect or consequential, including but not limited to loss of revenue, loss of income, loss of business, loss of profits, loss of goodwill or credit, loss of business reputation, loss of use, loss of interest, damage to credit rating or loss or denial of opportunity.</li>
            </ul>
            <p>We Exclude:</p>
            <ul>
                <li>any term, condition or warranty that may otherwise be implied by custom, law or statute;</li>
                <li>any liability for loss caused by our negligence; and</li>
                <li>any liability for Consequential Loss.</li>
                <li>To the extent permitted by law, our liability in respect of any breach of or failure to comply with any Consumer Guarantee is limited, at our option to any one or more of the following:</li>
                <li>In the case of goods, to:</li>
                <ol>
                    <li>the replacement of the goods or the supply of equivalent goods;</li>
                    <li>the repair of the goods;</li>
                    <li>the payment of the cost of replacing the goods or of acquiring equivalent goods; or</li>
                    <li>the payment of the cost of having the goods repaired.</li>
                </ol>
                <li>In the case of services, to:</li>
                <ol>
                    <li>the supplying of the services again; or</li>
                    <li>the payment of the cost of having the services supplied again.</li>
                </ol>
            </ul>
            <p>In the event of any problem with the Services (including any products) that you have purchased on or through this Site or otherwise from us, you agree that your sole remedy is to seek a return and refund for such Services (including any products) in accordance with the returns and refunds policies posted on our Site.</p>
            <p>For Jurisdictions that do not allow us to limit our liability: Notwithstanding any provision of this Agreement, if your jurisdiction has provisions specific to waiver or liability that conflict with the above then our liability is limited to the smallest extent possible by law. Specifically, in those jurisdictions not allowed, we do not disclaim liability for: (a) death or personal injury caused by its negligence or that of any of its officers, employees or agents; or (b) fraudulent misrepresentation; or (c) any liability which it is not lawful to exclude either now or in the future.</p>
            <p>If you are a resident of a jurisdiction that requires a specific statement regarding release then the following applies: “A GENERAL RELEASE DOES NOT EXTEND TO CLAIMS WHICH THE CREDITOR DOES NOT KNOW OR SUSPECT TO EXIST IN HIS OR HER FAVOR AT THE TIME OF EXECUTING THE RELEASE, WHICH IF KNOWN BY HIM OR HER MUST HAVE MATERIALLY AFFECTED HIS OR HER SETTLEMENT WITH THE DEBTOR.” You hereby waive any provision in law, regulation, or code that has the same intent or effect as the aforementioned release. Your ability to use our site is contingent on your agreement with this and all other sections of this Agreement. In the event that we may not limit our liability in your jurisdiction, you agree our total liability to you is not more than 10k or the total amount you spent while using our Site, Services (and any products) within the last six months, whichever is greater.</p>
            
            <br>
            <br>
            <h5>16.Indemnity</h5>
            <p>You agree to defend, indemnify and hold harmless Emmanuel Gathu its officers, directors, employees and agents, from and against any and all claims, damages, obligations, losses, liabilities, costs or debt, and expenses (including but not limited to attorney’s fees) arising from:</p>
            <ul>
                <li>your use of and access to our Site and Service;</li>
                <li>your violation of any term or condition of this Agreement;</li>
                <li>your violation of any term of condition of our Privacy Policy;</li>
                <li>your violation of any third party right, including without limitation any copyright, property, or privacy right; or</li>
                <li>any claim that any of your use caused damage to a third party.</li>
            </ul>
            <p>This indemnity will survive this Agreement and your use of our Services. You also agree that you have a duty to defend us against such claims and we may require you to pay for a solicitor of our choice in such cases. You agree that this indemnity extends to requiring you to pay for our reasonable solicitor’s fees, court costs, and disbursements including in relation to the settlement of any claim.</p>
            
            
            <h5>17.Privacy and Child Protection</h5>
            <ul>
                <li>We comply with the (“Privacy Act”) and the applicable Privacy Principles in the Privacy Act when handling personal information, together with the Health Records Act and the applicable Health Privacy Principles when handling personal information which is health information.</li>
            </ul>
            <p>Our Privacy Policy can be accessed by clicking on this link: <a href="#">Our Privacy Policy</a><br>Emmanuel Gathu complies with Child Protection legislation to the extent applicable.</p>
            <h5>18.Electronic Communications</h5>
            <p>We use electronic means of communication, whether you visit the Site or Service or send us e-mails, or whether we post notices on the Site or Service or communications with you via e-mail. For contractual purposes, you (1) consent to receive communications from us in an electronic form; (2) agree that all terms, conditions, agreements, notices, disclosures, and other communications that we provide to you electronically satisfy any legal requirement that such communications would satisfy if it were to be in writing. The foregoing does not affect your statutory rights.</p>
            <h5>19.Ammendments</h5>
            <p>We may amend this Agreement from time to time. When we amend this Agreement, we will update this page and indicate the date that it was last modified or we may email you. You may refuse to agree to the amendments, but if you do, you must immediately cease using our Site and our Service.</p>
            
            
            <h5>19.General</h5>
            <ul>
                <li>This Agreement constitutes the whole of the agreement between the parties. It supersedes and extinguishes any previous agreement or understanding between the parties about the subject matter of this Agreement and any representation or warranty previously given.</li>
                <li>If any provision of this Agreement is or becomes illegal, invalid or unenforceable in any jurisdiction, the provision must be read down so as to give it as much effect as possible. If it is not possible to give the provision any effect at all, it is severed from this Agreement. Any reading down or severance does not affect the validity and enforceability of the remaining provisions in that jurisdiction or the validity and enforceability of the offending provision in any other jurisdiction.</li>
                <li>No failure by either party to exercise and no delay in exercising any right under this Agreement will be taken as a waiver of the right. No waiver of any right is effective unless made in writing. Waiver of any particular right does not in any way release the other party from strict compliance in the future with the same or any other obligation.</li>
                <li>The rights and remedies provided in this Agreement are cumulative and do not exclude any other rights provided by law.</li>
            </ul>';
$html .='</table>';

$pdf->Ln(12);
$pdf->writeHTML($html);
$title = "Nutri App || Terms and Conditions";
$pdf->SetTitle($title);
ob_end_clean();
$pdf->Output("Nutri App Terms and Conditions.pdf"); //File Name
?>
      
   
</div>


<?php include 'includes/footer.php' ?>