@extends('layouts.app')

@section('body-content')
@php 
    function nice_number($n) {
        // first strip any formatting;
        $n = (0+str_replace(",", "", $n));

        // is this a number?
        if (!is_numeric($n)) return false;

        // now filter it;
        if ($n > 1000000000000) return round(($n/1000000000000), 2).' T';
        elseif ($n > 1000000000) return round(($n/1000000000), 2).' B';
        elseif ($n > 1000000) return round(($n/1000000), 2).' M';
        elseif ($n > 1000) return round(($n/1000), 2).' K';

        return number_format($n);
    }

@endphp

  <div class="search-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="search-title text-center">
            <h1>Simple, powerful & recognizable links</h1>
            <p>Brand, track, and share your short links, engage with your users on a different level.</p>
          </div>
        </div>
      </div>
      @if(!empty($message))
        <div class="alert text-danger" role="alert">
          <strong></strong>{{$message}}
        </div>
       @endif
      <div class="row">
          <div class="col-md-12">
            <div class="search-bar">
              <form method="get">
                @csrf
                <input type="search" name="q" placeholder="Search for interest">
                <select name="local" class="mr-2">
                  <option value="english">English</option>
                  <option value="french">French</option>
                  <option value="dutch">Dutch</option>
                  <option value="english-us">United states (us)</option>
                </select>
                <button type="submit" class="btn btn-primary">Explore</button>
                <p class="recent-items">Recent Search: 
                  @foreach($recent_search as $search)
                  <a href="">{{$search->keyword}}</a>
                  @endforeach
                </p>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="table-section" style="display: {{$display}}">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-area mb-5">
            <h3>Selection</h3>
            <form>
              <textarea class="form-control" rows="3"></textarea>
            </form>
            <div class="save-item mt-2">
              <a href=""><i class="far fa-clipboard"></i> Copy to clipboard</a>
              <a href=""><i class="fas fa-file-download"></i> Export to CSV</a>
            </div>
            <h4>Explore 132 interests related to {{$key ? $key : ''}}</h4>
          </div>
          <div class="table table-responsive">
            <p><a href="">Select all</a></p>

            <table class="table table-hover" id="table_id">
              <thead>
                <tr>
                  <th>INTERESTS</th>
                  <th>AUDIENCE SIZE</th>
                  <th>TOPIC</th>
                  <th>LINKS</th>
                </tr>
              </thead>
              <tbody>

              @if(!empty($data['keywordData']))
              
              @foreach($data['keywordData']['data'] as $keyword)  
            
                <tr>
                  <td>{{$keyword['name']}}</td>
                  <td>{{nice_number($keyword['audience_size'])}}</td>
                  <td>{{isset($keyword['topic']) ? $keyword['topic'] : ''}}</td>
                  <td>
                    <a href=""><i class="fab fa-facebook"></i></a>
                    <a href=""><i class="fab fa-google"></i></a>
                  </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>




  <div class="feature-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="feature-title text-center">
            <h2>Features</h2>
            <p>Measure traffic, know your audience, stay in control of your links.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="single-feature-item">
            <i class="fab fa-instagram"></i>
            <h4>Statistics</h4>
            <p>Get to know your audience, analyze the performance of your links.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="single-feature-item">
            <i class="fab fa-twitter"></i>
            <h4>Retargeting</h4>
            <p>Retarget your audience by adding tracking pixels to your links.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="single-feature-item">
            <i class="fab fa-linkedin-in"></i>
            <h4>Targeting</h4>
            <p>Redirect your users based on the country, platform, or language.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="single-feature-item">
            <i class="fab fa-skype"></i>
            <h4>Campaigns</h4>
            <p>Run time or clicks limited marketing campaigns.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="single-feature-item">
            <i class="fab fa-pinterest-p"></i>
            <h4>Privacy</h4>
            <p>Secure your links from unwanted visitors with the password option.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="single-feature-item">
            <i class="fab fa-facebook-f"></i>
            <h4>Customizability</h4>
            <p>Customize your links with custom domains and aliases.</p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="empower-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="empower-left">
            <h1>Empower your links</h1>
            <p>Users are aware of the links they're clicking, branded links will increase your brand recognition, inspire trust and increase your click-through rate.</p>
            <div class="empower-bottom">
              <div class="domain-section">
                <div class="domain-left">
                  <i class="fab fa-instagram"></i>
                </div>
                <div class="domain-right">
                  <h5>Domains</h5>
                  <p>Brand your links with your own domains and increase your click-through rate with up to 35% more.</p>
                </div>
              </div>
              <div class="alises-section">
                <div class="alises-left">
                  <i class="fab fa-instagram"></i>
                </div>
                <div class="alises-right">
                  <h5>Aliases</h5>
                  <p>There's no need for hard to remember links, personalize your links with easy to remember custom aliases.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="empower-right">
            <p class="like">Links</p>
            <div class="empower-right-links">
              <div class="empower-right-links-left-item">
                <div class="empower-top">
                  <i class="fab fa-instagram"></i>
                </div>
                <div class="empower-example">
                  <p>example.<span>com/bqh6e</span></p>
                  <span>Apple</span>
                </div>
              </div>
              <div class="empower-right-links-right-item">
                <i class="fab fa-instagram"></i>
                <i class="fas fa-ellipsis-h"></i>
              </div>
            </div>
            <div class="empower-right-links">
              <div class="empower-right-links-left-item">
                <div class="empower-top">
                  <i class="fab fa-instagram"></i>
                </div>
                <div class="empower-example">
                  <p>example.<span>com/bqh6e</span></p>
                  <span>Apple</span>
                </div>
              </div>
              <div class="empower-right-links-right-item">
                <i class="fab fa-instagram"></i>
                <i class="fas fa-ellipsis-h"></i>
              </div>
            </div>
            <div class="empower-right-links">
              <div class="empower-right-links-left-item">
                <div class="empower-top">
                  <i class="fab fa-instagram"></i>
                </div>
                <div class="empower-example">
                  <p>example.<span>com/bqh6e</span></p>
                  <span>Apple</span>
                </div>
              </div>
              <div class="empower-right-links-right-item">
                <i class="fab fa-instagram"></i>
                <i class="fas fa-ellipsis-h"></i>
              </div>
            </div>
            <div class="empower-right-links">
              <div class="empower-right-links-left-item">
                <div class="empower-top">
                  <i class="fab fa-instagram"></i>
                </div>
                <div class="empower-example">
                  <p>example.<span>com/bqh6e</span></p>
                  <span>Apple</span>
                </div>
              </div>
              <div class="empower-right-links-right-item">
                <i class="fab fa-instagram"></i>
                <i class="fas fa-ellipsis-h"></i>
              </div>
            </div>
            <div class="empower-right-links">
              <div class="empower-right-links-left-item">
                <div class="empower-top">
                  <i class="fab fa-instagram"></i>
                </div>
                <div class="empower-example">
                  <p>example.<span>com/bqh6e</span></p>
                  <span>Apple</span>
                </div>
              </div>
              <div class="empower-right-links-right-item">
                <i class="fab fa-instagram"></i>
                <i class="fas fa-ellipsis-h"></i>
              </div>
            </div>
          </div>
        </div>
    </div>
   </div>
  </div>




  <div class="empower-yourself-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="empower-yourself-left">
            <p>Stats</p>
            <div class="statistics-section">
              <div class="area-item">
                <div class="us-states">
                  <p><img src="img/us.svg">United States</p>
                  <span>12</span>
                </div>
                <div class="progress">
                  <div class="progress-bar" style="width: 10%;"></div>
                </div>
              </div>
              <div class="area-item">
                <div class="us-states">
                  <p><img src="img/windows.svg">United States</p>
                  <span>30</span>
                </div>
                <div class="progress">
                  <div class="progress-bar" style="width: 60%;"></div>
                </div>
              </div>
              <div class="area-item">
                <div class="us-states">
                  <p><img src="img/chrome.svg">United States</p>
                  <span>25</span>
                </div>
                <div class="progress">
                  <div class="progress-bar" style="width: 50%;"></div>
                </div>
              </div>
              <div class="area-item">
                <div class="us-states">
                  <p><img src="img/desktop.svg">United States</p>
                  <span>18</span>
                </div>
                <div class="progress">
                  <div class="progress-bar" style="width: 15%;"></div>
                </div>
              </div>
              <div class="area-item">
                <div class="us-states">
                  <p><img src="img/us.svg">United States</p>
                  <span>36</span>
                </div>
                <div class="progress">
                  <div class="progress-bar" style="width: 70%;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="empower-yourself-right">
            <h1>Empower yourself</h1>
            <p>Get to know your audience with our detailed statistics and better understand the performance of your links, while also being GDPR, CCPA and PECR compliant.</p>
            <div class="empower-yourself-right-bottom">
              <div class="stats-section">
                <div class="stats-left">
                  <i class="fab fa-instagram"></i>
                </div>
                <div class="stats-right">
                  <h5>Stats</h5>
                  <p>Get detailed statistics such as Referrers, Countries, Cities, Browsers, Platforms, Languages and Devices.</p>
                </div>
              </div>
              <div class="retargeting-section">
                <div class="retargeting-left">
                  <i class="fab fa-instagram"></i>
                </div>
                <div class="retargeting-right">
                  <h5>Retargeting</h5>
                  <p>Increase your conversion by reaching back your audience with our integration of pixel retargeting.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 
@endsection