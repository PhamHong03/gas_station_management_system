import requests
import json

# API Configuration
API_URL = "http://localhost:8000/gas-station/FindGas"
TIMEOUT = 10

# Request Data
payload = {
    "latitude": 10.021635369323453,
    "longitude": 105.76504626406854,
    "radius": 5,
    #"fuel_type": 1,
    # "operating_hours": "08:00:00"
}

headers = {
    "Content-Type": "application/json",
    "Accept": "application/json"
}

def debug_response(response):
    """Helper function to debug API responses"""
    print("\n=== DEBUG INFO ===")
    print(f"Status Code: {response.status_code}")
    print("Headers:", response.headers)
    print("Raw Content:", response.content)
    print("Text:", response.text)
    print("=================\n")

def find_gas_stations():
    try:
        # Try both GET and POST methods
        for method in [requests.get, requests.post]:
            response = method(
                API_URL,
                json=payload if method == requests.post else None,
                params=payload if method == requests.get else None,
                headers=headers,
                timeout=TIMEOUT
            )
            
            debug_response(response)  # Show debug info
            
            if response.status_code == 200:
                try:
                    data = response.json()
                    print(f"✅ Found {len(data)} gas stations")
                    for station in data:
                        print(f"\n⛽ {station.get('name')}")
                        print(f"   📍 {station.get('address')}")
                        print(f"   📏 {station.get('distance', 0):.2f} km away")
                    return data
                except json.JSONDecodeError:
                    print("⚠️ Received non-JSON response")
                    print("Response content:", response.text)
                    return None
            
            print(f"⚠️ {method.__name__.upper()} failed with status {response.status_code}")
        
        print("❌ All request methods failed")
        return None

    except requests.exceptions.RequestException as e:
        print(f"🚨 Request failed: {e}")
        return None

if __name__ == "__main__":
    find_gas_stations()