<?php

namespace Database\Seeders;

use App\Models\Policy;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('policies')->truncate();
        $data = [
            [
                'title' => 'Privacy policy',
                'slug' => 'privacy-policy',
                'content' => '<p><strong>Last Updated: November 27, 2023</strong></p>
                <p>Tripadvisor LLC owns and operates an online platform that provides users with information, recommendations and services related to travel and leisure, including tools for researching and/or booking hotels, rentals and other accommodations, attractions and experiences, restaurants, flights, and cruises, among other leisure-related services. In this Statement, we refer to these as our "Services".</p>
                <p>The information that you and others entrust us with enhances our ability to provide more relevant, personalized and helpful Services. We know that sharing your information with us is based on trust. We take your trust in us seriously and are committed to providing you helpful information, products and services, curated based on the information you have shared with us. Equally, and perhaps more importantly, we are committed to respecting your privacy when you visit our website or use our Services and being transparent about how we use the information you have entrusted to us.</p>
                <p>This Statement describes how we obtain, use, and process your information - hopefully, in an easily understandable and transparent mariner. It informs you of the rights you have, how you can exercise them and how you can contact us. Please review this Statement carefully to learn about our practices with respect to information and privacy. By visiting our websites and related mobile applications, as well as other online platforms such as our affiliated partners\' websites, apps and social media, whether on a computer, phone, tablet, or similar device (each of these is referred to as a "Device"), you acknowledge and confirm that you have read this Statement</p>
                <p>We offer our Services to users in a number of countries and territories where the laws and customs differ. This Statement provides a general overview of our privacy practices. In addition, Sections 12 through 15 of this Statement provide specific information relevant to users residing in certain regions or countries.</p>
                <p><strong>1. Information Collected and Processed</strong></p>
                <p>When you access or use our Services, we collect and process information from and about you to provide the Services in a more personalized and relevant way. Some information we collect passively, for example, with our servers or with cookies or other similar tracking technologies. Some information we collect from different sources, including from you, affiliated entities, business partners, and other independent third-party sources. When you use our Services by "clicking-through" from a third-party website or when you visit third-party websites via our Services, those third-party websites may share information with us about your use of their service. Any information that we receive from third-party websites may be combined with the information provided by you.</p>
                <p><strong>2. Information Uses and Purposes</strong></p>
                <p>To the extent possible, we want to provide you with relevant content and a tailored experience when you use our Services, and we use information about you to do that, including in the following ways:</p>
                <p><strong>3. Information Sharing</strong></p>
                <p>In order to provide some of our Services and processing activities, we use service providers and may need to share information with these service providers and certain other third parties, including our group of companies, in the following circumstances:</p>
                <p><strong>4. Information Choices</strong></p>
                <p>You have options with respect to the processing and use of your information by us. You can access, update, and even close your account by visiting the "Member Profile" section on our website or app. In addition, you can do the following:</p>
                <p><strong>5. Information on Children</strong></p>
                <p>Our Services are not intended for children, which we consider to be: (i) individuals that are 13 years of age or under, or the age of privacy consent in your jurisdiction; or (ii) when processing data on the basis of a contract, the age of legal capacity to enter into the agreement.</p>
                <p><strong>6. Information Transfers</strong></p>
                <p>We offer our Services to users located in many different jurisdictions. If we transfer your information to other countries, we will use and protect that information as described in this Statement and in accordance with applicable law.</p>
                <p><strong>7. Information Security</strong></p>
                <p>We have implemented appropriate administrative, technical, and physical security procedures to help protect your information. We only authorize specific personnel to access personal information and they may do so only for permitted business functions. We use encryption when transmitting your information between your system and ours, and between our system and those of the parties with whom we share information. We also employ firewalls and intrusion detection systems to help prevent unauthorized access to your information. However, we cannot guarantee the security of information from unauthorized entry or use, hardware or software failure, or other circumstances outside of our control.</p>
                <p><strong>8. Information Deletion and Retention</strong></p>
                <p>We will retain copies of your information for as long as you maintain your account or as necessary in connection with the purposes set out in this Statement, unless applicable law requires a longer retention period. In addition, we may retain your information for the duration of any period necessary to establish, exercise, or defend any legal rights.</p>
                <p><strong>9. Information from Cookies</strong></p>
                <p>We want your access to our Services to be as easy, efficient, and useful as possible. To help us do this, we use cookies and similar technologies to improve your experience, to enhance website security, and to show you relevant advertising.</p>
                <p><strong>10. Information on Statement Changes</strong></p>
                <p>We may update this Statement in the future. If we believe any changes are material, we will let you know by doing one or more of the following: sending you a communication about the changes, placing a notice on the website and/or posting an updated Statement on the website. We will note at the top of this Statement when it was most recently updated. We encourage you to check back from time to time to review the most current version and to periodically review this Statement for the latest information on our privacy practices.</p>
                <p><strong>11. Contact</strong></p>
                <p>If you have a data privacy request, such as a request to delete or access your data, please visit our dedicated privacy portal by clicking here. For general data privacy inquiries or questions concerning our Privacy and Cookies Statement, please contact our privacy team by clicking here.</p>',
                'page_banner_subtitle' => 'Let\'s Innovate Together for a',
                'page_banner_title' => 'Brighter Future!',
                'page_banner_image' => 'frontend/images/privacy_banner.jpg',
                'page_banner_image_alt_text' => 'Privacy policy',
                'meta_title' => 'Privacy policy',
                'meta_description' => 'Privacy policy',
                'meta_keywords' => 'Privacy policy',
                'status' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        Policy::insert($data);
    }
}