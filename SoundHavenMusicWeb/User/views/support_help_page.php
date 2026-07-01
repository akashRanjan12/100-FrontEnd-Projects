<style>
  /* end of setting boxes------------------- */
  .support_container {
    width: 100%;
    display: flex;
    gap: 10px;
    justify-content: center;
    height: auto;
    .left-part {
      width: 70%;
      padding: 10px;
    }
    .right-part {
      border-left: 1px solid whitesmoke;
      width: 290px;
      .options {
        position: sticky;
        top: 0;
        display: flex;
        flex-direction: column;
        padding: 10px;
        p {
          cursor: pointer;
          margin: 3px;
          transition: all 0.3s ease;
          &:hover {
            transform: scale(1.03);
          }
        }
      }
    }
  }
  /* by default display box */
  .first-box {
    height: auto;
    width: 100%;
    display: flex;
    flex-direction: column;
    h1,
    h2 {
      color: gray;
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    section {
      margin-bottom: 30px;
    }
  }
  /* all rest of boxes are none */
  .boxes {
    height: auto;
    display: none;
    flex-direction: column;
    h1,
    h2 {
      color: gray;
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    section {
      margin-bottom: 30px;
    }
  }

  .box-01 {
    display: flex;
  }
  .burger {
    background-color: white;
    color: black;
    font-size: 1.1rem;
    width: max-content;
    padding: 5px 10px;
    border-radius: 4px;
    position: fixed;
    top: 100px;
    right: 0;
    display: none;
    justify-content: center;
    align-items: center;
    cursor: pointer;
  }

  @media (max-width: 768px) {
    .support_container {
      .left-part {
        width: 100%;
      }
      .right-part {
        display: none;
        position: fixed;
        right: 0;
        top: 130px;
        width: 230px;
        background-color: white;
        color: black;
        border-radius: 4px;
      }
    }
    .burger {
      display: flex;
    }
  }
</style>

<div class="support_container">
  <div class="left-part container-part">
    <div class="first-box box-01">
      <h1>Terms of Use – Sound Haven</h1>
      <p><strong>Effective Date:</strong> [Insert Date]</p>

      <section>
        <h2>1. Overview of Our Service</h2>
        <p>
          Sound Haven is an online platform that enables users to upload,
          stream, and share music or audio content. Users can create personal
          playlists, interact with other users' content through likes and
          comments, and manage their musical experience in a community-driven
          environment. Our platform is designed to promote creativity,
          collaboration, and expression within the audio space.
        </p>
      </section>

      <section>
        <h2>2. Eligibility to Use</h2>
        <p>
          By using Sound Haven, you confirm that you are at least 13 years old.
          Users between 13 and 18 years old must have parental or guardian
          consent. If you are underage and do not meet these requirements, you
          are not permitted to use the platform.
        </p>
      </section>

      <section>
        <h2>3. Account Responsibility</h2>
        <p>
          To access certain features, users must create an account by providing
          accurate and up-to-date information. You are responsible for
          maintaining the confidentiality of your login credentials. Any
          activity that occurs under your account is your responsibility. Notify
          us immediately if you suspect unauthorized access.
        </p>
      </section>

      <section>
        <h2>4. User-Generated Content</h2>
        <p>
          You are solely responsible for the content you upload, including
          music, audio tracks, descriptions, and profile information. You must
          own the rights or have proper permission to upload any material. Do
          not upload copyrighted content, offensive material, or anything
          illegal. Sound Haven reserves the right to remove or restrict access
          to content that violates our policies or applicable laws.
        </p>
      </section>

      <section>
        <h2>5. Intellectual Property Rights</h2>
        <p>
          All user-uploaded content remains the property of the respective user.
          By uploading, you grant Sound Haven a non-exclusive, worldwide license
          to use, display, stream, and promote your content on the platform. The
          Sound Haven name, logo, design, and proprietary code are the
          intellectual property of Sound Haven and may not be copied or reused
          without written permission.
        </p>
      </section>

      <section>
        <h2>6. Acceptable Use Policy</h2>
        <p>
          You agree not to misuse Sound Haven’s services. Prohibited activities
          include spamming, harassing other users, uploading viruses or
          malicious code, scraping data, or using bots. Commercial activities
          without prior approval are also forbidden. Violations may lead to
          suspension or termination of your account.
        </p>
      </section>

      <section>
        <h2>7. Privacy and Data</h2>
        <p>
          We respect your privacy and protect your personal data in accordance
          with our Privacy Policy. Your usage and data collection are outlined
          in detail there. By using Sound Haven, you consent to the data
          practices described in our privacy documentation.
        </p>
      </section>

      <section>
        <h2>8. Account Termination</h2>
        <p>
          Sound Haven reserves the right to terminate or suspend your access at
          any time for violating these Terms of Use. You may also delete your
          account at your discretion. Termination may result in loss of access
          to all your content and data associated with the account.
        </p>
      </section>

      <section>
        <h2>9. Limitation of Liability</h2>
        <p>
          Sound Haven is provided on an “as-is” and “as-available” basis. We do
          not guarantee that the platform will always be available or
          error-free. We are not liable for any loss of data, user disputes,
          interruptions in service, or damages resulting from the use or
          inability to use the service.
        </p>
      </section>

      <section>
        <h2>10. Updates to Terms</h2>
        <p>
          We may modify these Terms of Use periodically. Users will be notified
          of significant changes, and continued use of the platform constitutes
          acceptance of the updated terms. It is your responsibility to review
          the Terms regularly.
        </p>
      </section>

      <section>
        <h2>11. Contact Information</h2>
        <p>
          If you have any questions, feedback, or concerns regarding these
          Terms, you can reach us via:
        </p>
        <p><strong>Email:</strong> support@soundhaven.com</p>
        <p><strong>Phone:</strong> [1234-1235-01]</p>
        <p><strong>Address:</strong> [Bhagalpur, Bihar]</p>
      </section>
    </div>
    <div class="boxes box-02">
      <h1>Privacy Policy – Sound Haven</h1>
      <p><strong>Effective Date:</strong> [Insert Date]</p>

      <section>
        <h2>1. Introduction</h2>
        <p>
          At Sound Haven, we respect your privacy and are committed to
          protecting your personal data. This Privacy Policy outlines how we
          collect, use, store, and disclose information when you use our website
          and services.
        </p>
      </section>

      <section>
        <h2>2. Information We Collect</h2>
        <p>
          When you use Sound Haven, we collect both personal and non-personal
          information. This includes:
        </p>
        <ul>
          <li>Your name, email address, and profile details</li>
          <li>Uploaded content (e.g., music, playlists, profile photos)</li>
          <li>
            Usage data such as pages visited, tracks played, and interactions
            (likes, comments)
          </li>
          <li>Device and browser information</li>
          <li>IP address and location (for security and analytics)</li>
        </ul>
      </section>

      <section>
        <h2>3. How We Use Your Information</h2>
        <p>We use the collected data to:</p>
        <ul>
          <li>Provide and improve the platform's features and functionality</li>
          <li>Customize your experience</li>
          <li>Respond to customer service requests</li>
          <li>
            Send updates, security alerts, or promotional content (optional)
          </li>
          <li>Prevent abuse, fraud, and ensure platform security</li>
        </ul>
      </section>

      <section>
        <h2>4. Cookies and Tracking Technologies</h2>
        <p>
          Sound Haven uses cookies and similar technologies to enhance user
          experience, analyze trends, and gather demographic information.
          Cookies may store user preferences, session information, and browsing
          activity. You can manage your cookie preferences through your browser
          settings.
        </p>
      </section>

      <section>
        <h2>5. Sharing of Information</h2>
        <p>
          We do not sell or rent your personal data. However, we may share it
          with:
        </p>
        <ul>
          <li>
            Trusted third-party service providers (hosting, analytics, payment)
          </li>
          <li>
            Legal authorities if required by law or to protect Sound Haven’s
            rights
          </li>
          <li>
            Other users (only content and public interactions like comments and
            playlists)
          </li>
        </ul>
      </section>

      <section>
        <h2>6. Data Security</h2>
        <p>
          We implement security measures such as encryption, access controls,
          and secure hosting to protect your data. However, no system is
          completely secure, and we cannot guarantee absolute protection of your
          information.
        </p>
      </section>

      <section>
        <h2>7. Your Rights and Choices</h2>
        <p>You have the right to:</p>
        <ul>
          <li>Access and review your personal data</li>
          <li>Update or correct your information</li>
          <li>Delete your account and data (upon request)</li>
          <li>Opt-out of marketing communications</li>
        </ul>
      </section>

      <section>
        <h2>8. Third-Party Links</h2>
        <p>
          Our platform may contain links to third-party websites. We are not
          responsible for the privacy practices of those sites. We encourage you
          to review their policies before providing any information.
        </p>
      </section>

      <section>
        <h2>9. Children's Privacy</h2>
        <p>
          Sound Haven is not intended for users under the age of 13. We do not
          knowingly collect data from children. If we learn that we have
          unintentionally collected such data, we will take immediate steps to
          delete it.
        </p>
      </section>

      <section>
        <h2>10. Changes to This Privacy Policy</h2>
        <p>
          We may update this Privacy Policy from time to time. All changes will
          be posted on this page, and the effective date will be updated.
          Continued use of the site after changes implies acceptance of the
          updated policy.
        </p>
      </section>

      <section>
        <h2>11. Contact Us</h2>
        <p>
          If you have any questions or concerns about this policy, feel free to
          contact us:
        </p>
        <p><strong>Email:</strong> privacy@soundhaven.com</p>
        <p><strong>Phone:</strong> [Insert Phone Number]</p>
        <p><strong>Address:</strong> [Insert Business Address]</p>
      </section>
    </div>
    <div class="boxes box-03">
      <h1>Cookies Policy – Sound Haven</h1>
      <p><strong>Effective Date:</strong> [Insert Date]</p>

      <section>
        <h2>1. What Are Cookies?</h2>
        <p>
          Cookies are small text files that are stored on your device when you
          visit a website. They help the site remember your preferences and
          improve your overall user experience. Cookies can be "persistent"
          (remain on your device after closing the browser) or "session"
          (deleted when you close your browser).
        </p>
      </section>

      <section>
        <h2>2. How We Use Cookies</h2>
        <p>Sound Haven uses cookies for various purposes, including:</p>
        <ul>
          <li>Remembering your login session and user preferences</li>
          <li>Analyzing site traffic and usage patterns</li>
          <li>Providing personalized content and recommendations</li>
          <li>Securing your account and protecting against fraud</li>
          <li>Storing your playlist, music settings, and player state</li>
        </ul>
      </section>

      <section>
        <h2>3. Types of Cookies We Use</h2>
        <ul>
          <li>
            <strong>Essential Cookies:</strong> Required for the platform to
            function, such as authentication and session management.
          </li>
          <li>
            <strong>Performance Cookies:</strong> Collect anonymous usage data
            to help improve site functionality.
          </li>
          <li>
            <strong>Functional Cookies:</strong> Store user preferences like
            theme, language, and volume settings.
          </li>
          <li>
            <strong>Analytics Cookies:</strong> Help us understand user behavior
            through tools like Google Analytics.
          </li>
        </ul>
      </section>

      <section>
        <h2>4. Managing and Deleting Cookies</h2>
        <p>
          You can control cookie behavior through your browser settings. This
          includes:
        </p>
        <ul>
          <li>Viewing what cookies are stored on your device</li>
          <li>Deleting specific or all cookies</li>
          <li>Blocking cookies entirely or from certain sites</li>
          <li>
            Setting preferences to clear cookies when you close the browser
          </li>
        </ul>
        <p>
          However, disabling essential cookies may impact your ability to use
          certain features on Sound Haven.
        </p>
      </section>

      <section>
        <h2>5. Third-Party Cookies</h2>
        <p>
          Some cookies may be set by third-party services used on our platform,
          such as analytics tools or embedded content. These cookies are
          governed by the privacy policies of those third parties.
        </p>
      </section>

      <section>
        <h2>6. Cookie Security</h2>
        <p>
          Cookies used on Sound Haven do not store sensitive information like
          passwords. We use secure cookies for authentication and encrypt any
          data where necessary to ensure your safety and privacy.
        </p>
      </section>

      <section>
        <h2>7. Updates to This Policy</h2>
        <p>
          We may update our Cookies Policy from time to time. All changes will
          be posted on this page. By continuing to use Sound Haven, you agree to
          the revised policy.
        </p>
      </section>

      <section>
        <h2>8. Contact Us</h2>
        <p>
          If you have any questions about our use of cookies, feel free to reach
          out to us at:
        </p>
        <p><strong>Email:</strong> support@soundhaven.com</p>
        <p><strong>Phone:</strong> [Insert Phone Number]</p>
        <p><strong>Address:</strong> [Insert Business Address]</p>
      </section>
    </div>
    <div class="boxes box-04">
      <h1>Community Guidelines – Sound Haven</h1>
      <p><strong>Effective Date:</strong> [Insert Date]</p>

      <section>
        <h2>1. Welcome to the Sound Haven Community</h2>
        <p>
          Sound Haven is a space for artists, creators, and music lovers to
          connect, share, and inspire. To maintain a safe and supportive
          environment for everyone, we ask all users to follow these community
          guidelines.
        </p>
      </section>

      <section>
        <h2>2. Respect and Inclusion</h2>
        <p>
          We value diversity and inclusivity. Treat all members with kindness
          and respect. Hate speech, discrimination, racism, sexism, and personal
          attacks are strictly prohibited.
        </p>
      </section>

      <section>
        <h2>3. Content Guidelines</h2>
        <p>
          Only upload content you own or have the legal right to share. Any
          copyrighted material without permission will be removed. Explicit or
          offensive content must be clearly marked or may be restricted.
        </p>
      </section>

      <section>
        <h2>4. No Harassment or Bullying</h2>
        <p>
          Bullying, harassment, threats, or doxing are not tolerated. If you
          feel unsafe or are being harassed, please report the user immediately.
        </p>
      </section>

      <section>
        <h2>5. Spam and Self-Promotion</h2>
        <p>
          We encourage creators to share their work, but avoid excessive
          promotion, irrelevant links, or spam. Keep content relevant and
          authentic.
        </p>
      </section>

      <section>
        <h2>6. Child Safety</h2>
        <p>
          We have zero tolerance for any content that exploits or endangers
          children. Any such content will be reported to legal authorities and
          the user account will be permanently banned.
        </p>
      </section>

      <section>
        <h2>7. Platform Integrity</h2>
        <p>
          Do not use bots, automation, or scripts to manipulate plays, likes, or
          comments. Users must not attempt to hack, disrupt, or compromise
          platform performance or data security.
        </p>
      </section>

      <section>
        <h2>8. Reporting and Moderation</h2>
        <p>
          Our team actively moderates reports of policy violations. If content
          or behavior violates these guidelines, we may remove it, suspend, or
          terminate user accounts.
        </p>
      </section>

      <section>
        <h2>9. Be a Positive Contributor</h2>
        <p>
          Engage with others in meaningful ways. Leave constructive feedback,
          celebrate diversity in music styles, and help new creators grow by
          sharing encouragement and support.
        </p>
      </section>

      <section>
        <h2>10. Updates to the Guidelines</h2>
        <p>
          We may update these guidelines as Sound Haven evolves. Continued use
          of the platform means you agree to follow the most current version.
        </p>
      </section>

      <section>
        <h2>11. Need Help?</h2>
        <p>
          If you have questions, feedback, or need to report an issue, contact
          us anytime:
        </p>
        <p><strong>Email:</strong> support@soundhaven.com</p>
        <p><strong>Phone:</strong> [Insert Contact Number]</p>
        <p><strong>Address:</strong> [Insert Company Address]</p>
      </section>
    </div>
    <div class="boxes box-05">
      <h1>Report Illegal Content – Sound Haven</h1>
      <p><strong>Effective Date:</strong> [Insert Date]</p>

      <section>
        <h2>1. Our Commitment</h2>
        <p>
          At Sound Haven, we are committed to maintaining a safe and legal
          environment for creators and listeners. We take the presence of
          illegal, harmful, or unauthorized content seriously and provide users
          with tools to report such materials efficiently.
        </p>
      </section>

      <section>
        <h2>2. What is Considered Illegal Content?</h2>
        <p>Illegal content includes but is not limited to:</p>
        <ul>
          <li>Copyright-infringing music or audio files</li>
          <li>Hate speech, extremist content, or incitement to violence</li>
          <li>Content involving exploitation or abuse of minors</li>
          <li>Material containing viruses, malware, or harmful code</li>
          <li>
            Content that promotes illegal activities (e.g., drug use, terrorism)
          </li>
        </ul>
      </section>

      <section>
        <h2>3. How to Report</h2>
        <p>
          If you come across content that violates the law or Sound Haven's
          policies, please report it immediately using the following steps:
        </p>
        <ul>
          <li>
            Click the “Report” button located near the track or user profile
          </li>
          <li>Choose the reason that best fits your concern</li>
          <li>
            Optionally, provide a brief explanation or supporting evidence
          </li>
        </ul>
        <p>
          Alternatively, you can email us directly at
          <strong>report@soundhaven.com</strong> with full details including the
          URL, username, and nature of the violation.
        </p>
      </section>

      <section>
        <h2>4. What Happens Next?</h2>
        <p>
          Once a report is submitted, our moderation team will review the
          content promptly. If it is found to violate our policies or legal
          standards, we will take appropriate action, which may include removal,
          account suspension, or reporting to authorities.
        </p>
      </section>

      <section>
        <h2>5. False Reporting</h2>
        <p>
          We encourage users to report issues responsibly. Submitting false,
          malicious, or misleading reports may result in action against your
          account, including suspension.
        </p>
      </section>

      <section>
        <h2>6. Confidentiality</h2>
        <p>
          All reports are kept confidential. Your identity will not be shared
          with the person or account you report, unless required by law.
        </p>
      </section>

      <section>
        <h2>7. Contact Us</h2>
        <p>
          For further questions or concerns about content reporting, you may
          reach out at:
        </p>
        <p><strong>Email:</strong> report@soundhaven.com</p>
        <p><strong>Phone:</strong> [Insert Contact Number]</p>
        <p><strong>Address:</strong> [Insert Business Address]</p>
      </section>
    </div>
    <div class="boxes box-06">
      <h1>About Copyrights – Sound Haven</h1>
      <p><strong>Effective Date:</strong> [Insert Date]</p>

      <section>
        <h2>1. What is Copyright?</h2>
        <p>
          Copyright is a legal right that gives the creator of original work
          (such as music, lyrics, or sound recordings) exclusive rights to use,
          share, and license their content. This protects the work from
          unauthorized use, duplication, or distribution.
        </p>
      </section>

      <section>
        <h2>2. User Responsibilities</h2>
        <p>
          As a user of Sound Haven, you must only upload content that you own or
          have permission to use. This includes:
        </p>
        <ul>
          <li>Music you personally created</li>
          <li>Tracks or samples for which you hold licensing rights</li>
          <li>
            Content that is in the public domain or properly attributed under
            Creative Commons licenses
          </li>
        </ul>
        <p>
          Uploading copyrighted material without permission is strictly
          prohibited and may result in content removal or account termination.
        </p>
      </section>

      <section>
        <h2>3. Platform Policy on Infringement</h2>
        <p>
          Sound Haven takes copyright infringement seriously. We respond to all
          valid takedown requests and investigate reported violations under the
          Digital Millennium Copyright Act (DMCA) and international copyright
          laws.
        </p>
      </section>

      <section>
        <h2>4. Copyright Ownership</h2>
        <p>
          You retain all rights to your original work uploaded to Sound Haven.
          However, by uploading, you grant Sound Haven a non-exclusive,
          royalty-free license to stream and publicly display your content for
          users of the platform.
        </p>
      </section>

      <section>
        <h2>5. Reporting Infringement</h2>
        <p>
          If you believe your work has been uploaded to Sound Haven without
          authorization, you may submit a takedown request. Please include the
          following:
        </p>
        <ul>
          <li>Your contact information</li>
          <li>Exact URL(s) of the infringing content</li>
          <li>A description of your original work</li>
          <li>
            A statement that you own the copyright or are authorized to act on
            behalf of the owner
          </li>
        </ul>
        <p>Email all reports to <strong>copyright@soundhaven.com</strong></p>
      </section>

      <section>
        <h2>6. Counter Notices</h2>
        <p>
          If you believe a takedown request was made in error and your content
          is not infringing, you may submit a counter notice with evidence. We
          will review your claim and may reinstate your content if appropriate.
        </p>
      </section>

      <section>
        <h2>7. Educational Purpose & Fair Use</h2>
        <p>
          Sound Haven respects fair use principles for education, commentary,
          criticism, and non-commercial transformative work. However, users are
          responsible for ensuring their use complies with applicable copyright
          laws.
        </p>
      </section>

      <section>
        <h2>8. Contact</h2>
        <p>For questions or concerns regarding copyright, reach out to us:</p>
        <p><strong>Email:</strong> copyright@soundhaven.com</p>
        <p><strong>Phone:</strong> [Insert Contact Number]</p>
        <p><strong>Address:</strong> [Insert Business Address]</p>
      </section>
    </div>
    <div class="boxes box-07">
      <h1>Report Copyright Infringement</h1>
      <p><strong>Effective Date:</strong> [Insert Date]</p>

      <section>
        <h2>1. Introduction</h2>
        <p>
          Sound Haven respects the intellectual property rights of others and
          expects its users to do the same. If you believe that content hosted
          on our platform infringes your copyright, you can submit a formal
          takedown request using the instructions below.
        </p>
      </section>

      <section>
        <h2>2. Required Information</h2>
        <p>
          Your report must include the following details to be considered valid:
        </p>
        <ul>
          <li>Your full name and contact information (email and phone)</li>
          <li>
            A description of the copyrighted work you believe has been infringed
          </li>
          <li>The exact URL(s) of the infringing content on Sound Haven</li>
          <li>
            A statement that you have a good faith belief that the use is
            unauthorized
          </li>
          <li>
            A statement under penalty of perjury that the information provided
            is accurate and that you are the copyright owner or authorized to
            act on their behalf
          </li>
          <li>Your electronic or physical signature</li>
        </ul>
      </section>

      <section>
        <h2>3. Where to Send</h2>
        <p>Send your takedown request to our designated copyright agent:</p>
        <p><strong>Email:</strong> copyright@soundhaven.com</p>
        <p><strong>Phone:</strong> [Insert Number]</p>
        <p><strong>Mail:</strong> [Insert Business Address]</p>
      </section>

      <section>
        <h2>4. Processing Time</h2>
        <p>
          We review all copyright claims within 3–5 business days. If your
          request is complete and valid, we will promptly remove the content and
          may notify the uploader.
        </p>
      </section>

      <section>
        <h2>5. Counter Notice</h2>
        <p>
          If the user believes the content was wrongly removed, they can submit
          a counter-notification explaining their legal right to use the
          content. We may restore the content unless legal action is initiated.
        </p>
      </section>

      <section>
        <h2>6. Abuse of Process</h2>
        <p>
          Submitting false or misleading infringement notices is against the
          law. Abuse of this process may result in legal consequences and
          account suspension.
        </p>
      </section>

      <section>
        <h2>7. Need Help?</h2>
        <p>
          If you have any questions about this process, please contact us at
          <a href="mailto:support@soundhaven.com">support@soundhaven.com</a>.
        </p>
      </section>
    </div>
    <div class="boxes box-08">
      <section>
        <h1>About SoundHaven</h1>

        <p>
          <strong>SoundHaven</strong> is a digital sanctuary for music lovers,
          creators, and dreamers. Born out of a passion for sound and
          connection, our platform allows artists to share their unique voices
          and listeners to discover audio experiences that resonate deeply.
          Whether you're a rising producer, an independent artist, or simply
          someone who finds peace in music, SoundHaven is your stage.
        </p>

        <p>
          We are dedicated to empowering creators by offering a space where
          music can be uploaded, streamed, liked, commented on, and shared—all
          without boundaries. Users can also build and manage playlists, explore
          trending audio, and connect with like-minded people across the globe.
        </p>

        <p>
          At SoundHaven, we believe in community-driven growth. Our platform is
          shaped by the users and artists who fill it with life. We prioritize
          creativity, respect, and transparency. Every beat matters, every voice
          counts.
        </p>

        <p>
          Our mission is simple:
          <strong>to make music a shared journey</strong>. From solo tracks to
          collaborative playlists, from bedroom studios to professional audio
          labs—SoundHaven welcomes every sound and story.
        </p>

        <p>
          We continue to evolve with feedback and innovation. Thank you for
          being part of our growing family. Let's build the future of audio
          together, one sound at a time.
        </p>

        <p>
          <strong>Welcome to SoundHaven—where your sound finds a home.</strong>
        </p>
      </section>
    </div>
    <div class="boxes box-09">
      <section>
        <h1>Website Creator Info</h1>

        <p>
          This website, <strong>SoundHaven</strong>, was conceptualized,
          designed, and developed by
          <span class="highlight">Akash Ranjan</span>.
        </p>

        <p>
          Akash is a passionate web developer and cybersecurity enthusiast who
          combines creativity and functionality to deliver impactful digital
          experiences. His vision for SoundHaven was to create a platform that
          celebrates music, connects creators with their audience, and fosters
          an inclusive and safe community for music lovers around the world.
        </p>

        <p>
          With a background in computer applications and a focus on full-stack
          development, Akash used technologies such as HTML, CSS, JavaScript,
          PHP, and MySQL to build SoundHaven from scratch. His dedication to
          user experience, responsive design, and performance optimization has
          shaped SoundHaven into a smooth and modern music-sharing platform.
        </p>

        <p>
          In addition to development, Akash also designed the user interface,
          structured the user-content system, and ensured the platform was
          scalable and secure for long-term use.
        </p>

        <p><strong>Contact the Creator:</strong></p>
        <ul>
          <li>Email: akash@soundhaven.com</li>
          <li>
            LinkedIn:
            <a href="" target="_blank"
              >linkedin.com/in/akashranjan</a
            >
          </li>
          <li>
            Portfolio:
            <a href="" target="_blank"
              >akashranjan.dev</a
            >
          </li>
        </ul>

        <p>
          SoundHaven continues to evolve under Akash’s leadership, with a
          commitment to innovation, user satisfaction, and love for the art of
          sound.
        </p>
      </section>
    </div>
  </div>
  <div class="right-part option-part">
    <div class="options">
      <h1>Leagal:</h1>
      <p onclick="showBox('box-01')">Terms of Uses</p>
      <p onclick="showBox('box-02')">Privacy Policy</p>
      <p onclick="showBox('box-03')">Cookies</p>
      <p onclick="showBox('box-04')">Comunity Guidelines</p>
      <p onclick="showBox('box-05')">Report Illegal content</p>
      <br />
      <h1>Copyrights:</h1>
      <p onclick="showBox('box-06')">About copyrights</p>
      <p onclick="showBox('box-07')">Report Copyright</p>
      <br />
      <h1>About</h1>
      <p onclick="showBox('box-08')">About SoundHaven</p>
      <p onclick="showBox('box-09')">Website Creator Info</p>
    </div>
  </div>
</div>
<div class="burger" onclick="menuShow()">
  <i class="fa-solid fa-bars"></i> &nbsp; About | Legal | CopyRighr
</div>

<script>
  function showBox(className) {
    const allBoxes = document.querySelectorAll(".container-part > div");
    allBoxes.forEach((box) => {
      box.style.display = box.classList.contains(className) ? "flex" : "none";
    });
  }

  // burger menu logic--------------

  let menuvalue = true;
  function menuShow() {
    if (menuvalue == true) {
      document.querySelector(".right-part").style.display = "flex";
      menuvalue = false;
    } else {
      document.querySelector(".right-part").style.display = "none";
      menuvalue = true;
    }
  }
</script>
