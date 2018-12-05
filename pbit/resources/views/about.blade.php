@extends('layouts.app')
@section('title','home')
@section('style')
<style type="text/css">
.left-section {
    float: left;
    width: 48%;
}
.right-section {
    float: right;
    width: 48%;
}  
ul.pargh.section2li li {
    font-family: 'AvenirNextLTPro-Regular';
    list-style: unset;
    padding: 5px;
} 
</style>
@endsection
 @section('content')
 <div class="outer_area">
 <div class="container">
  <div class="section1ab">
      <h2 class="rel-heading">Our Chief Power BI Architect & Your Instructor:</h2>
      <span>Errin O’Connor</span >
      <p class="pargh">
          With over 22 years of experience in IT consulting, Errin has led many of the U.S. and Canada’s largest Business Intelligence (BI), data warehousing, Azure, Office 365, SharePoint and Hybrid Cloud efforts for over 75 Fortune 500 companies. 
      </p>
       <p class="pargh">
          Errin is a frequent speaker at Power BI, Microsoft Azure, SharePoint and Office 365 conferences and events. He has also led enterprise engagements for NASA, PepsiCo, Northrop Grumman, United Airlines, Ford, Novartis, AT&T, the Federal Reserve Bank, the Department of Justice, Nike, the U.S. Department of State, the United States Air Force, Chevron, ConocoPhillips and Kofax to name a few additional past clients. 
      </p>
      <p class="pargh">     
         Errin is the author of 4 Microsoft Press books and delivers world class IT services leveraging his ability to provide scalable enterprise level solutions combined with the operational experience to execute those solutions effectively.  
      </p>
  </div>

  <div class="section2ab">
      <h2 class="rel-heading margiin_tp">Career Highlights:</h2>
      <ul class="pargh section2li">
       <li> 4-Time Microsoft Press Best Selling author on Power BI, SharePoint and Office 365</li> 
       <li> Led the Microsoft Technology Integration efforts for the United Airlines and Continental Airlines merger</li> 
       <li> Implemented the eDiscovery effort for the Federal Reserve Bank upon the Implementation of TARP by the US Treasury and reported to the Congressional Oversight Committee</li> 
       <li>Was on the very first beta team for Microsoft’s “Project Tahoe” which then became “SharePoint 2001”  </li> 
       <li>Was invited by Microsoft to participate as an independent advisor and SME for both Office 365 and Microsoft Azure’s original beta program and its product development and rollout </li> 
       <li>Lead Architect for the NASA SharePoint, Office 365 and Azure Implementation Efforts for all 8 of NASA’s Major Facilities and reported directly to NASA’s CIO Chris Kemp</li>
       <li>Led the Northrop Grumman eRoom to SharePoint Online migration effort with 18 terabytes of content</li> 
       <li>Was invited by Vivek Kundra, the first ever CIO of the United States who was appointed by President Obama, to participate as an Office 365 and Microsoft Azure Cloud Subject Matter Expert. Errin joined the advisory team implementing his 25-point implementation plan for President Obama on how to reform how the federal government manages information technology and champion new cloud technologies</li> 
        <li>Led the Office 365 initiatives for PepsiCo, Nike, Chevron, Lexmark\Kofax, Alcoa and 45 additional Fortune 100 companies</li>
      </ul>       
  </div>

  <div class="section3ab">
      <h2 class="rel-heading margiin_tp">About EPC GROUP:</h2>
      <p class="pargh">
        EPC Group has a long history as a leading Office 365, SharePoint, Azure, Power BI and Microsoft technology platform related management and consulting firm. Founded in 1997, EPC Group has been pioneering the way organizations collaborate at a rapid and unparalleled rate. 
      </p>
       <p class="pargh">
        We leverage our deep expertise through tested and proven “From the Consulting Trenches” strategies that serve as the foundation for our solutions and services for thousands of organizations. Our award-winning strategies focus on harnessing your organization’s granular business requirements to provide end-to-end solutions to meet your organization’s exact needs.
      </p>       
  </div>
  <div class="section4ab">     
    <div class="publications-wrapper">
      <h3 class="subTitle padL16 rel-heading margiin_tp">Our Publications</h3>
      <div class="left-section">
       
        <div class="innersection">
          <h5>Microsoft Power BI Dashboards Step by Step – By Microsoft Press</h5> 
          <div class="left_area_imgg">
            <img src="{{asset('public/images')}}/book4.jpg">
          </div>
          <div class="textsection">
		    
            <p><b>Microsoft Power BI Dashboards Step by Step</b>guides you through creating world-class business analysis dashboards that integrate today’s most widely-used data sources, using any of Microsoft’s Power BI platforms, including the new Power BI Premium. Author Errin O’Connor has worked with 70+ Fortune® 500 companies and led 450+ Power BI engagements: he is singularly well-qualified to guide you through successfully designing, architecting, and implementing Power BI in your organization. Using real-world examples and success stories, this full-color, hands-on guide walks through the key decisions analysts and developers need to make upfront, and introduces all the concepts, skills, and techniques you’ll need to achieve your goals</p>
            <a href="#" class="buy aboutsectionbtn buy_now">Purchase</a>
          </div>
        </div> 
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
            <div id="collapseOne" class="panel-collapse collapse in overslowtop" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                <p>
                  <ul>
                      <li>  Aggregating data and data elements from numerous internal and external data sources</li>
                      <li> Building rich, live dashboards to monitor crucial data from across your organization</li>
                      <li> Developing dynamic visualizations, including charts, maps, graphs, and more</li>
                      <li>  Creating stunning interactive reports</li>
                      <li>  Driving user adoption through effective training</li>
                      <li>  Taking full advantage of Microsoft’s powerful new Power BI Premium</li>
                  </ul>
                  Whether you’re new to Power BI or you’ve already built Power BI dashboards, O’Connor supports you throughout your entire data journey, as you bring raw data to life through dynamic visualizations that deliver actionable intelligence for your entire organization.
                </p>
              </div>
            </div>
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                EPC GROUP'S POWER BI DASHBOARDS VIA MICROSOFT PRESS 
              </a>
              </h4>
            </div>         
          </div>		
        </div>
      </div>
      <!--Second ection-->
      <div class="right-section">
       
        <div class="innersection">
          <h5>SharePoint 2013 Field Guide: Advice From The Consulting Trenches – By SAMS Publishing | Pearson</h5> 
          <div class="left_area_imgg">
            <img src="{{asset('public/images')}}/book1.jpg">
          </div>
          <div class="textsection">		   
            <p>Get a team of senior-level SharePoint consultants by your side, helping you optimize your success throughout your entire SharePoint 2013 / Office 365 SharePoint Online initiative!</p>
            <p class="margin_tps"><b>SharePoint 2013 Field Guide: Advice From the Consulting Trenches</b> reveals how world-class consultants approach, plan, implement and deploy SharePoint 2013 and Office 365’s SharePoint Online to ensure its long-term success. This real-world guide covers every phase and element of the process drawing from the success of EPC Group’s 1000+ SharePoint and Office 365 deployments.</p>
            <a href="#" class="buy aboutsectionbtn buy_now">Purchase</a>
          </div>
        </div> 
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default"> 
            <div id="collapseOne1" class="panel-collapse collapse in overslowtop" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
              <p>
                <ul>
                  <li>Initial "whiteboarding" of potential overall solutions</li>
                  <li>Consideration of existing infrastructure, including older versions of SharePoint</li>
                  <li>Developing roadmaps, architectures, security, compliance, and detailed, step-by-step implementation plans</li>
                  <li>Best Practices covering SharePoint 2013 On-Premise as well as Office 365's SharePoint Online Successfully executing your SharePoint / Office 365 implementation plan, testing, and â€œgoing liveâ€</li>
                  <li>Proven strategies around the "public, private, and hybrid cloud"  for SharePoint 2016 and Office 365's SharePoint Online</li>
                </ul>
              </p>
              </div>
            </div>          
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
                 EPC GROUP'S NEW BOOK COVERING SHAREPOINT 2013/O365  
                </a>
              </h4>
            </div>                             
          </div>   
        </div>
      </div>
      <!--Second ection-->
      <!--Third ection-->
      <div class="right-section">

        <div class="innersection">
          <h5>Windows SharePoint Services 3.0 – Inside Out – By Microsoft Press</h5> 
          <div class="left_area_imgg">
            <img src="{{asset('public/images')}}/book2.jpg">
          </div>
          <div class="textsection">
        
            <p>Learn everything you need to know for working with Microsoft Windows SharePoint Services Version 3.0–from the inside out! This book packs hundreds of time-saving solutions, troubleshooting tips and workarounds for using Windows SharePoint Services–all in concise, fast answer format. This information-packed complete reference shows you how to get the most out of Windows SharePoint Services. You will learn how to simplify information sharing, make team collaboration more efficient and improve your personal productivity. You’ll discover how to design workflows and projects for SharePoint sites, manage design teams and source control and use cascading style sheets to control site appearance. You’ll get to explore new features for using Windows SharePoint Services with blogs, RSS and wikis. You’ll even learn how to use Windows SharePoint Services with other products, including Microsoft Office Excel Services, Microsoft Office Project Server 2007 and Microsoft Visual Studio 2005 Team System.</p>
            <a href="#" class="buy aboutsectionbtn buy_now">Purchase</a>
          </div>
        </div> 
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
            <div id="collapseOne4" class="panel-collapse collapse in overslowtop" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                <p>
                  <ul>
                    <li>Makes hundreds of tips, tricks, and workarounds easy to find and apply with the award-winning Inside Out format</li>
                    <li>Drills into the features and functions in Windows SharePoint</li>
                    <li>Services, delivering comprehensive details--but no fluff--in a single volume</li>
                    <li>Interactive companion CD with CBT's from EPC Group, tools, eBooks, and more</li>
                  </ul>
                </p>
              </div>
            </div>
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne4" aria-expanded="true" aria-controls="collapseOne">
                EPC GROUP'S SHAREPOINT 2007 BOOK VIA MICROSOFT PRESS 
              </a>
            </h4>
            </div>                        
          </div>    
        </div>
      </div>
      <!--Third ection-->
      <!--Fourth ection-->
      <div class="left-section">
     

        <div class="innersection">
           <h5>Microsoft SharePoint Foundation 2010 – Inside Out – By Microsoft Press</h5> 
        <div class="left_area_imgg">
        <img src="{{asset('public/images')}}/book3.jpg">
        </div>
        <div class="textsection">
    
        <p class="un-p">Dive in to Microsoft SharePoint Foundation 2010 and learn how to connect and empower your users. This in-depth reference packs hundreds of timesaving solutions, troubleshooting tips and workarounds in a supremely organized format. Discover how the experts tackle SharePoint Foundation 2010 and challenge yourself! Build team sites with no-code solutions, modify and share content with SharePoint lists and libraries. Learn how to development and implement governance policies to plan SharePoint’s site structure and how to design custom SharePoint solutions using the .NET framework.</p>

        <a href="#" class="buy aboutsectionbtn buy_now">Purchase</a>
        </div>
        </div> 
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
             <div id="collapseOne2" class="panel-collapse collapse in overslowtop" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
              <p>
                <ul>
                  <li>Build communities that empower people to work together in new ways</li>
                  <li>Simplify information sharing, make team collaboration more efficient</li>
                  <li>Create sites for employees, partners, and customers to collaborate securely</li>
                  <li>Direct the entire content lifecycle from creation to disposition</li>
                  <li>Use SharePoint Search to find people and information anywhere</li>
                  <li>Customize site appearance with cascading style sheets</li>
                  <li>Use SharePoint Foundation with other products, including Excel Services, and Microsoft Visual Studio Team System</li>
                </ul>
              </p>
              </div>
            </div>  
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne2" aria-expanded="true" aria-controls="collapseOne">
                EPC GROUP'S SHAREPOINT 2010 BOOK VIA MICROSOFT PRESS  
                </a>
              </h4>
            </div>               
          </div>    
        </div>   
      </div>      
    </div>
  </div><!--Fourth ection--> 
    </div>
</div>

  <div class="container">       
   @include('components.customcode')
  </div>
  @endsection


  @section('script')
  <script type="text/javascript">
  </script>
  @endsection                                  