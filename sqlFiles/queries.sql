
-- List of queries to implement for Term Project

     -- Query 1: Price of ticker for a specific date

     	SELECT * FROM sp500_quotes
	WHERE date='2015-1-04' AND ticker='AMD';

     -- Query 2: Price of specific ticker for a date range
     	
	SELECT * FROM sp500_quotes
	WHERE ticker='AMD' AND
	date BETWEEN '2012-4-10' AND '2013-4-10';

     -- Query 3: Ticker within a price range (close) for a specific date
     	
	


     -- Query 4: Tickers within price range (close) for a date range


     -- Query 5: Average open/close price of a ticker for date range


     -- Query 6: Stocks with greatest change in price (close) for date range


     -- Query 7: The change in price for ticker for date range


     -- Query 8: Show 10 companies with in certain price range (close) for specific company


     -- Query 9: Show companies from same industry as selected ticker

     	SELECT * FROM sp500_stocks 
	WHERE industry IN (
	      SELECT industry FROM sp500_stocks
	      WHERE ticker='AMD'
	      GROUP BY industry
	      );     	

     -- Query 10: Show top 5 companies per sector based on price (close) for date

     -- Query 11: Show the highest close price for specific ticker and year (All years)
     	
     	      SELECT ticker, AVG(close), YEAR(date) FROM sp500_quotes
	      WHERE YEAR(date)='2014' AND ticker='AMD'
	      GROUP BY YEAR(date);